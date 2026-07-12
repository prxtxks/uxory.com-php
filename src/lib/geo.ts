/**
 * Tiny offline geocoder for review locations — no external API.
 * Reviews only need city-level accuracy for the globe. Unknown cities fall
 * back to the country centroid (with a small deterministic jitter so several
 * reviews from one country don't stack on the exact same pixel).
 */

type LatLng = [number, number];

const CITIES: Record<string, LatLng> = {
  // India
  'mumbai': [19.08, 72.88], 'delhi': [28.61, 77.21], 'new delhi': [28.61, 77.21],
  'bangalore': [12.97, 77.59], 'bengaluru': [12.97, 77.59], 'hyderabad': [17.39, 78.49],
  'chennai': [13.08, 80.27], 'kolkata': [22.57, 88.36], 'pune': [18.52, 73.86],
  'ahmedabad': [23.03, 72.58], 'jaipur': [26.91, 75.79], 'surat': [21.17, 72.83],
  'lucknow': [26.85, 80.95], 'nagpur': [21.15, 79.09], 'indore': [22.72, 75.86],
  'chandigarh': [30.73, 76.78], 'goa': [15.30, 74.12], 'kochi': [9.93, 76.27],
  'nashik': [19.99, 73.79], 'gurgaon': [28.46, 77.03], 'gurugram': [28.46, 77.03], 'noida': [28.54, 77.39],
  // USA
  'new york': [40.71, -74.01], 'nyc': [40.71, -74.01], 'los angeles': [34.05, -118.24],
  'chicago': [41.88, -87.63], 'houston': [29.76, -95.37], 'phoenix': [33.45, -112.07],
  'san francisco': [37.78, -122.42], 'seattle': [47.61, -122.33], 'boston': [42.36, -71.06],
  'austin': [30.27, -97.74], 'dallas': [32.78, -96.80], 'miami': [25.76, -80.19],
  'atlanta': [33.75, -84.39], 'denver': [39.74, -104.99], 'san diego': [32.72, -117.16],
  'washington': [38.91, -77.04], 'washington dc': [38.91, -77.04], 'cincinnati': [39.10, -84.51],
  'columbus': [39.96, -83.00], 'cleveland': [41.50, -81.69], 'san jose': [37.34, -121.89],
  'ohio': [40.0, -82.9], // state-level pin (JadeRock etc.)
  // Nepal
  'kathmandu': [27.72, 85.32], 'pokhara': [28.21, 83.99], 'lalitpur': [27.67, 85.32],
  'bhaktapur': [27.67, 85.43], 'chitwan': [27.53, 84.35], 'biratnagar': [26.45, 87.27],
  // Germany
  'berlin': [52.52, 13.40], 'munich': [48.14, 11.58], 'hamburg': [53.55, 9.99],
  'frankfurt': [50.11, 8.68], 'cologne': [50.94, 6.96], 'stuttgart': [48.78, 9.18],
  // UK
  'london': [51.51, -0.13], 'manchester': [53.48, -2.24], 'birmingham': [52.49, -1.89],
  'edinburgh': [55.95, -3.19], 'glasgow': [55.86, -4.25],
  // Other common
  'dubai': [25.20, 55.27], 'abu dhabi': [24.45, 54.38], 'singapore': [1.35, 103.82],
  'sydney': [-33.87, 151.21], 'melbourne': [-37.81, 144.96], 'toronto': [43.65, -79.38],
  'vancouver': [49.28, -123.12], 'paris': [48.86, 2.35], 'amsterdam': [52.37, 4.90],
  'tokyo': [35.68, 139.65], 'kuala lumpur': [3.14, 101.69], 'hong kong': [22.32, 114.17],
  'colombo': [6.93, 79.85], 'dhaka': [23.81, 90.41], 'karachi': [24.86, 67.01],
};

const COUNTRIES: Record<string, LatLng> = {
  'india': [22.0, 78.9], 'in': [22.0, 78.9],
  'usa': [39.8, -98.6], 'us': [39.8, -98.6], 'united states': [39.8, -98.6], 'america': [39.8, -98.6],
  'nepal': [28.2, 84.1], 'np': [28.2, 84.1],
  'germany': [51.1, 10.4], 'de': [51.1, 10.4],
  'uk': [54.5, -2.5], 'united kingdom': [54.5, -2.5], 'england': [52.5, -1.5], 'gb': [54.5, -2.5],
  'uae': [24.0, 54.0], 'united arab emirates': [24.0, 54.0],
  'canada': [56.1, -106.3], 'ca': [56.1, -106.3],
  'australia': [-25.3, 133.8], 'au': [-25.3, 133.8],
  'singapore': [1.35, 103.82], 'sg': [1.35, 103.82],
  'france': [46.6, 2.2], 'netherlands': [52.1, 5.3], 'japan': [36.2, 138.3],
  'sri lanka': [7.9, 80.8], 'bangladesh': [23.7, 90.4], 'pakistan': [30.4, 69.3],
  'malaysia': [4.2, 101.9], 'hong kong': [22.32, 114.17],
};

const norm = (s: string) => s.trim().toLowerCase().replace(/\s+/g, ' ');

/** Deterministic small jitter (±0.8°) from a string, so same-country reviews spread out. */
function jitter(seed: string): [number, number] {
  let h = 0;
  for (let i = 0; i < seed.length; i++) h = (h * 31 + seed.charCodeAt(i)) | 0;
  const a = ((h % 1000) / 1000 - 0.5) * 1.6;
  const b = (((h >> 10) % 1000) / 1000 - 0.5) * 1.6;
  return [a, b];
}

/**
 * Resolve a city/country pair to [lat, lng].
 * City match wins; else country centroid + jitter; else null (review simply
 * doesn't appear on the globe).
 */
export function geocode(city?: string | null, country?: string | null, seed = ''): LatLng | null {
  if (city) {
    const hit = CITIES[norm(city)];
    if (hit) return hit;
  }
  if (country) {
    const hit = COUNTRIES[norm(country)];
    if (hit) {
      const [ja, jb] = jitter(seed || `${city}-${country}`);
      return [hit[0] + ja, hit[1] + jb];
    }
  }
  return null;
}

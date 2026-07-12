// Two-currency pricing: INR for India, USD for everyone else.
async function localizeCurrency() {
  const ids = ['monthlyPrice', 'yearlyPrice', 'sparkPrice', 'catalystPrice', 'titlePrice'];
  const els = {};
  ids.forEach((id) => (els[id] = document.getElementById(id)));
  if (ids.every((id) => !els[id])) return;

  const USD = { monthly: '$29 /m', yearly: '$139 /y', spark: '$299', catalyst: '$639', title: '$299' };
  const INR = { monthly: '₹1,999 /m', yearly: '₹9,999 /y', spark: '₹24,999', catalyst: '₹44,999', title: '₹24,999' };

  let p = USD; // default: Global (USD)
  try {
    const geo = await (await fetch('https://ipwho.is/')).json();
    if (geo && geo.success && geo.country_code === 'IN') p = INR;
  } catch (e) {
    /* keep USD default */
  }

  if (els.monthlyPrice) els.monthlyPrice.innerText = p.monthly;
  if (els.yearlyPrice) els.yearlyPrice.innerText = p.yearly;
  if (els.sparkPrice) els.sparkPrice.innerText = p.spark;
  if (els.catalystPrice) els.catalystPrice.innerText = p.catalyst;
  if (els.titlePrice) els.titlePrice.innerText = p.title;

  document.body.classList.add('prices-loaded');
}

localizeCurrency();

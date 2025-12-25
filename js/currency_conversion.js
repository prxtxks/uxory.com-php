async function localizeCurrency() {
    const mEl = document.getElementById('monthlyPrice');
    const yEl = document.getElementById('yearlyPrice');
    const sEl = document.getElementById('sparkPrice');    // New Card 1
    const cEl = document.getElementById('catalystPrice'); // New Card 2

    // Safety check: if NONE of these exist, stop. 
    // If SOME exist, the script will still continue.
    if (!mEl && !yEl && !sEl && !cEl) return;

    try {
        // 1. Get Geo Data
        const geoRes = await fetch('https://ipwho.is/');
        const geoData = await geoRes.json();
        
        let userCurrency = "USD";
        let currencySymbol = "$";

        if (geoData.country_code === "IN") {
            userCurrency = "INR";
            currencySymbol = "₹";
        } else if (geoData.country_code === "DE") {
            userCurrency = "EUR";
            currencySymbol = "€";
        } else if (geoData.country_code === "GB") {
            userCurrency = "GBP";
            currencySymbol = "£";
        }

        // 2. Get Rates
        const rateRes = await fetch('https://open.er-api.com/v6/latest/USD');
        const rateData = await rateRes.json();
        
        if (rateData.result === "success") {
            const rate = rateData.rates[userCurrency] || 1;
            const locale = userCurrency === "INR" ? 'en-IN' : 'en-US';
            
            // 3. Calculate and Update each element if it exists on the page
            if (mEl) {
                const finalMonthly = Math.round(29 * rate);
                mEl.innerText = `${currencySymbol}${finalMonthly.toLocaleString(locale)} /m`;
            }

            if (yEl) {
                const finalYearly = Math.round(139 * rate);
                yEl.innerText = `${currencySymbol}${finalYearly.toLocaleString(locale)} /y`;
            }

            if (sEl) {
                const finalSpark = Math.round(299 * rate);
                sEl.innerText = `${currencySymbol}${finalSpark.toLocaleString(locale)}`;
            }

            if (cEl) {
                const finalCatalyst = Math.round(639 * rate);
                cEl.innerText = `${currencySymbol}${finalCatalyst.toLocaleString(locale)}`;
            }
        }
    } catch (err) {
        console.error("Script error:", err);
        // Fallbacks for all
        if (mEl) mEl.innerText = "$29 /m";
        if (yEl) yEl.innerText = "$139 /y";
        if (sEl) sEl.innerText = "$299";
        if (cEl) cEl.innerText = "$639";
    } finally {
        document.body.classList.add('prices-loaded');
    }
}

localizeCurrency();
async function localizeCurrency() {
    const mEl = document.getElementById('monthlyPrice');
    const yEl = document.getElementById('yearlyPrice');
    const sEl = document.getElementById('sparkPrice');
    const cEl = document.getElementById('catalystPrice');
    const tEl = document.getElementById('titlePrice');

    // Safety check: if none of the price elements exist, stop execution
    if (!mEl && !yEl && !sEl && !cEl && !tEl) return;

    try {
        // 1. Get Geo Data
        const geoRes = await fetch('https://ipwho.is/');
        const geoData = await geoRes.json();
        
        let userCurrency = "USD";
        let currencySymbol = "$";
        let locale = "en-US";

        if (geoData && geoData.success) {
            if (geoData.country_code === "IN") {
                userCurrency = "INR";
                currencySymbol = "₹";
                locale = "en-IN";
            } else if (geoData.country_code === "DE") {
                userCurrency = "EUR";
                currencySymbol = "€";
                locale = "de-DE";
            } else if (geoData.country_code === "GB") {
                userCurrency = "GBP";
                currencySymbol = "£";
                locale = "en-GB";
            } else if (geoData.country_code === "MX") {
                userCurrency = "MXN";
                currencySymbol = "$";
                locale = "es-MX";
            } else if (geoData.country_code === "PH") {
                userCurrency = "PHP";
                currencySymbol = "₱";
                locale = "en-PH";
            } else if (geoData.country_code === "NP") {
                userCurrency = "NPR";
                currencySymbol = "रू";
                locale = "ne-NP";
            }
        }

        // 2. Get Exchange Rates
        const rateRes = await fetch('https://open.er-api.com/v6/latest/USD');
        const rateData = await rateRes.json();
        
        let displayMonthly, displayYearly, displaySpark, displayCatalyst, displayTitle;

        // 3. APPLY LOGIC
        if (userCurrency === "INR") {
            // FORCED STRATEGIC INDIA PRICING
            displayMonthly = "₹1,999 /m";
            displayYearly = "₹9,999 /y";
            displaySpark = "₹24,999";
            displayCatalyst = "₹44,999";
            displayTitle = "₹24,999";
        } else {
            // WORLDWIDE AUTOMATIC CALCULATION
            const rate = (rateData && rateData.rates) ? rateData.rates[userCurrency] : 1;
            
            displayMonthly = `${currencySymbol}${Math.round(29 * rate).toLocaleString(locale)} /m`;
            displayYearly = `${currencySymbol}${Math.round(139 * rate).toLocaleString(locale)} /y`;
            displaySpark = `${currencySymbol}${Math.round(299 * rate).toLocaleString(locale)}`;
            displayCatalyst = `${currencySymbol}${Math.round(639 * rate).toLocaleString(locale)}`;
            displayTitle = displaySpark; 
        }

        // 4. FINAL UI UPDATE
        if (mEl) mEl.innerText = displayMonthly;
        if (yEl) yEl.innerText = displayYearly;
        if (sEl) sEl.innerText = displaySpark;
        if (cEl) cEl.innerText = displayCatalyst;
        if (tEl) tEl.innerText = displayTitle;
        
    } catch (err) {
        console.error("Critical Script Error:", err);
        // Fallback to USD Defaults
        if (mEl) mEl.innerText = "$29 /m";
        if (yEl) yEl.innerText = "$139 /y";
        if (sEl) sEl.innerText = "$299";
        if (cEl) cEl.innerText = "$639";
        if (tEl) tEl.innerText = "$299";
    } finally {
        document.body.classList.add('prices-loaded');
    }
}

localizeCurrency();
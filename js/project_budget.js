
    document.addEventListener('DOMContentLoaded', function() {
        const countrySelect = document.querySelector('select[name="country"]');
        const budgetSelect = document.getElementById('budget');


        countrySelect.addEventListener('change', function() {
            const selectedCountry = countrySelect.value;
            budgetSelect.innerHTML = ''; // Clear existing options

            if (selectedCountry === 'United States') {
                budgetSelect.innerHTML += `
                    <option value="Upto 10k">Upto $10K</option>
                    <option value="$10k - $25k">$10k - $25k</option>
                    <option value="$25k - $50k">$25k - $50k</option>
                    <option value="$50k - $100k">$50k - $100k</option>
                    <option value="Other/Currency Not in USD">Other/Currency Not in USD</option>
                `;
            } else if (selectedCountry === 'India') {
                budgetSelect.innerHTML += `
                    <option value="Upto 10k">Upto ₹10K</option>
                    <option value="₹10k - ₹25k">₹10k - ₹25k</option>
                    <option value="₹25k - ₹50k">₹25k - ₹50k</option>
                    <option value="₹50k - ₹100k">₹50k - ₹100k</option>
                    <option value="Other/Currency Not in INR">Other/Currency Not in INR</option>
                `;
            } else {
                budgetSelect.innerHTML += `<option selected value="Unspecified">Select</option>`;
            }
        });
    });

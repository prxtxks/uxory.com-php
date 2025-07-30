  // Fetch the user's country from the server
  fetch('php/get_ip.php')
    .then(response => response.json())
    .then(data => {
      const country = data.country;
      const pricingElement = document.getElementById('pricing');


      if (country === 'India') {
        // Set pricing in INR
        pricingElement.innerHTML = '<p>₹6,000 /m</p>'; // Example pricing
      } else {
        // Set pricing in USD
        pricingElement.innerHTML = '<p>$6,000 /m</p>'; // Example pricing
      }
    })
    .catch(error => console.error('Error fetching country:', error));

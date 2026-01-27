document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('contactForm');
  const statusMsg = document.getElementById('statusMsg');

  // Safety check
  if (!contactForm || !statusMsg) {
    console.error('Contact form or status message not found');
    return;
  }

  contactForm.addEventListener('submit', function (e) {
    e.preventDefault(); // 🔒 hard stop browser submit

    statusMsg.innerHTML = 'Processing...';

    // Get captcha response
    const recaptchaResponse = grecaptcha.getResponse();

    if (!recaptchaResponse) {
      statusMsg.innerHTML =
        '<span class="text-red-500">Please complete the CAPTCHA.</span>';
      return;
    }

    const formData = new FormData(contactForm);
    formData.append('g-recaptcha-response', recaptchaResponse);

    fetch('/php/contact', {
      method: 'POST',
      body: formData
    })
      .then(res => {
        if (!res.ok) throw new Error('Network error');
        return res.json();
      })
      .then(data => {
        if (data.status === 'success') {
          statusMsg.innerHTML =
            `<span class="text-green-500">${data.message}</span>`;
          contactForm.reset();
        } else {
          statusMsg.innerHTML =
            `<span class="text-red-500">${data.message}</span>`;
        }

        grecaptcha.reset();
      })
      .catch(err => {
        console.error(err);
        statusMsg.innerHTML =
          '<span class="text-red-500">Service unavailable. Please try again later.</span>';
        grecaptcha.reset();
      });
  });
});
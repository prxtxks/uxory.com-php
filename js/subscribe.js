const form = document.getElementById('subscribeForm');
const statusMsg = document.getElementById('statusMsg');

form.addEventListener('submit', function (e) {
  e.preventDefault();
  statusMsg.innerHTML = 'Processing...'; // Feedback for user

  const emailInput = form.querySelector('input[name="email"]').value;
  const recaptchaResponse = grecaptcha.getResponse();

  if (!recaptchaResponse) {
    statusMsg.innerHTML = '<span class="text-red-500">Please complete the CAPTCHA.</span>';
    return;
  }

  const formData = new FormData(form);
  // No need to manually append if the widget is inside or captured correctly, 
  // but this ensures it is sent.
  formData.append('g-recaptcha-response', recaptchaResponse);

  fetch('/php/subscribe', {
    method: 'POST',
    body: formData
  })
  .then(res => {
    if (!res.ok) throw new Error('Network response was not ok');
    return res.json();
  })
  .then(data => {
    if (data.status === 'success') {
      statusMsg.innerHTML = `<span class="text-green-500">${data.message}</span>`;
      form.reset();
      grecaptcha.reset();
    } else {
      statusMsg.innerHTML = `<span class="text-red-500">${data.message}</span>`;
      // Don't reset CAPTCHA here so user can try again immediately if email was wrong
    }
  })
  .catch(err => {
    console.error(err);
    statusMsg.innerHTML = '<span class="text-red-500">Service unavailable. Please try again later.</span>';
    grecaptcha.reset();
  });
});
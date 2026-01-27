document.addEventListener('DOMContentLoaded', () => {
  const applicationForm = document.getElementById('applicationForm');
  const statusMsg = document.getElementById('applicationStatusMsg');

  // Safety check
  if (!applicationForm || !statusMsg) {
    return;
  }

  applicationForm.addEventListener('submit', function (e) {
    e.preventDefault();

    statusMsg.innerHTML = '<span class="text-yellow-500">Submitting application...</span>';

    // Get captcha response
    const recaptchaResponse = grecaptcha.getResponse();

    if (!recaptchaResponse) {
      statusMsg.innerHTML = '<span class="text-red-500">Please complete the CAPTCHA.</span>';
      return;
    }

    const formData = new FormData(applicationForm);
    formData.append('g-recaptcha-response', recaptchaResponse);

    fetch('/php/submit_application', {
      method: 'POST',
      body: formData
    })
      .then(res => {
        if (!res.ok) throw new Error('Network error');
        return res.json();
      })
      .then(data => {
        if (data.status === 'success') {
          statusMsg.innerHTML = `<span class="text-green-500">${data.message}</span>`;
          applicationForm.reset();
          // Reset file name display
          const fileNameDisplay = document.getElementById('file-name');
          if (fileNameDisplay) fileNameDisplay.textContent = '';
        } else {
          statusMsg.innerHTML = `<span class="text-red-500">${data.message}</span>`;
        }

        grecaptcha.reset();
      })
      .catch(err => {
        console.error(err);
        statusMsg.innerHTML = '<span class="text-red-500">Service unavailable. Please try again later.</span>';
        grecaptcha.reset();
      });
  });
});

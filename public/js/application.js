document.addEventListener('DOMContentLoaded', () => {
  const applicationForm = document.getElementById('applicationForm');
  const statusMsg = document.getElementById('applicationStatusMsg');
  const applicationSuccess = document.getElementById('applicationSuccess');
  const applicationResetBtn = document.getElementById('applicationResetBtn');

  if (!applicationForm) return;

  let captchaRequired = false;
  let captchaWidgetId = null;

  function showSuccess() {
    applicationForm.classList.add('hidden');
    if (statusMsg) statusMsg.classList.add('hidden');
    if (applicationSuccess) {
      applicationSuccess.classList.remove('hidden');
      // Re-trigger SVG animations
      const svg = applicationSuccess.querySelector('svg');
      if (svg) {
        const clone = svg.cloneNode(true);
        svg.parentNode.replaceChild(clone, svg);
      }
    }
  }

  function resetForm() {
    applicationForm.reset();
    applicationForm.classList.remove('hidden');
    if (statusMsg) {
      statusMsg.innerHTML = '';
      statusMsg.classList.remove('hidden');
    }
    const fileNameDisplay = document.getElementById('file-name');
    if (fileNameDisplay) fileNameDisplay.textContent = '';
    if (applicationSuccess) applicationSuccess.classList.add('hidden');
    captchaRequired = false;
    captchaWidgetId = null;
    const wrapper = document.getElementById('application-recaptcha-wrapper');
    if (wrapper) wrapper.classList.add('hidden');
  }

  if (applicationResetBtn) {
    applicationResetBtn.addEventListener('click', resetForm);
  }

  applicationForm.addEventListener('submit', function (e) {
    e.preventDefault();
    if (statusMsg) statusMsg.innerHTML = '<span class="text-yellow-500">Submitting application...</span>';

    const formData = new FormData(applicationForm);

    if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
      const captchaResponse = grecaptcha.getResponse(captchaWidgetId);
      if (!captchaResponse) {
        if (statusMsg) statusMsg.innerHTML = '<span class="text-red-500">Please complete the CAPTCHA.</span>';
        return;
      }
      formData.append('g-recaptcha-response', captchaResponse);
    }

    fetch('/php/submit_application', {
      method: 'POST',
      body: formData
    })
      .then(res => {
        if (!res.ok) throw new Error('Network error');
        return res.json();
      })
      .then(data => {
        if (data.status === 'captcha_required') {
          captchaRequired = true;
          const wrapper = document.getElementById('application-recaptcha-wrapper');
          if (wrapper) wrapper.classList.remove('hidden');
          if (captchaWidgetId === null && typeof grecaptcha !== 'undefined' && grecaptcha.render) {
            captchaWidgetId = grecaptcha.render('application-recaptcha', {
              sitekey: '6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX',
            });
          }
          if (statusMsg) statusMsg.innerHTML = '<span class="text-primary">Please complete the CAPTCHA, then submit again.</span>';
          return;
        }

        if (data.status === 'success') {
          showSuccess();
        } else {
          if (statusMsg) statusMsg.innerHTML = '<span class="text-red-500">' + data.message + '</span>';
        }

        if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
          grecaptcha.reset(captchaWidgetId);
        }
      })
      .catch(err => {
        console.error(err);
        if (statusMsg) statusMsg.innerHTML = '<span class="text-red-500">Service unavailable. Please try again later.</span>';
        if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
          grecaptcha.reset(captchaWidgetId);
        }
      });
  });
});

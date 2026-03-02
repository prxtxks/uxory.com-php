document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('contactForm');
  const statusMsg = document.getElementById('statusMsg');
  const formSuccess = document.getElementById('formSuccess');
  const formResetBtn = document.getElementById('formResetBtn');
  const formCard = contactForm ? contactForm.closest('.review-form-card') : null;

  if (!contactForm) return;

  let captchaRequired = false;
  let captchaWidgetId = null;

  function showSuccess() {
    contactForm.classList.add('hidden');
    if (statusMsg) statusMsg.classList.add('hidden');
    if (formSuccess) {
      formSuccess.classList.remove('hidden');
      // Re-trigger SVG animations by cloning and reinserting
      const svg = formSuccess.querySelector('svg');
      if (svg) {
        const clone = svg.cloneNode(true);
        svg.parentNode.replaceChild(clone, svg);
      }
    }
  }

  function resetForm() {
    contactForm.reset();
    contactForm.classList.remove('hidden');
    if (statusMsg) {
      statusMsg.innerHTML = '';
      statusMsg.classList.remove('hidden');
    }
    if (formSuccess) formSuccess.classList.add('hidden');
    captchaRequired = false;
    captchaWidgetId = null;
    const wrapper = document.getElementById('contact-recaptcha-wrapper');
    if (wrapper) wrapper.classList.add('hidden');
  }

  if (formResetBtn) {
    formResetBtn.addEventListener('click', resetForm);
  }

  contactForm.addEventListener('submit', function (e) {
    e.preventDefault();
    if (statusMsg) statusMsg.innerHTML = 'Processing...';

    const formData = new FormData(contactForm);

    if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
      const captchaResponse = grecaptcha.getResponse(captchaWidgetId);
      if (!captchaResponse) {
        if (statusMsg) statusMsg.innerHTML = '<span class="text-red-500">Please complete the CAPTCHA.</span>';
        return;
      }
      formData.append('g-recaptcha-response', captchaResponse);
    }

    fetch('/php/contact', {
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
          const wrapper = document.getElementById('contact-recaptcha-wrapper');
          if (wrapper) wrapper.classList.remove('hidden');
          if (captchaWidgetId === null && typeof grecaptcha !== 'undefined' && grecaptcha.render) {
            captchaWidgetId = grecaptcha.render('contact-recaptcha', {
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

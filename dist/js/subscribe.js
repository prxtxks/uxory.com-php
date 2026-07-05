document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('subscribeForm');
  const statusMsg = document.getElementById('statusMsg');

  if (!form || !statusMsg) return;

  let captchaRequired = false;
  let captchaWidgetId = null;

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    statusMsg.innerHTML = 'Processing...';

    const formData = new FormData(form);

    if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
      const captchaResponse = grecaptcha.getResponse(captchaWidgetId);
      if (!captchaResponse) {
        statusMsg.innerHTML = '<span class="text-red-500">Please complete the CAPTCHA.</span>';
        return;
      }
      formData.append('g-recaptcha-response', captchaResponse);
    }

    fetch('/php/subscribe', {
      method: 'POST',
      body: formData
    })
    .then(res => {
      if (!res.ok) throw new Error('Network response was not ok');
      return res.json();
    })
    .then(data => {
      if (data.status === 'captcha_required') {
        captchaRequired = true;
        const wrapper = document.getElementById('subscribe-recaptcha-wrapper');
        wrapper.classList.remove('hidden');
        if (captchaWidgetId === null && typeof grecaptcha !== 'undefined' && grecaptcha.render) {
          captchaWidgetId = grecaptcha.render('subscribe-recaptcha', {
            sitekey: '6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX',
          });
        }
        statusMsg.innerHTML = '<span class="text-primary">Please complete the CAPTCHA, then submit again.</span>';
        return;
      }

      if (data.status === 'success') {
        statusMsg.innerHTML = '<span class="text-green-500">' + data.message + '</span>';
        form.reset();
        if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
          grecaptcha.reset(captchaWidgetId);
        }
      } else {
        statusMsg.innerHTML = '<span class="text-red-500">' + data.message + '</span>';
      }
    })
    .catch(err => {
      console.error(err);
      statusMsg.innerHTML = '<span class="text-red-500">Service unavailable. Please try again later.</span>';
      if (captchaRequired && captchaWidgetId !== null && typeof grecaptcha !== 'undefined') {
        grecaptcha.reset(captchaWidgetId);
      }
    });
  });
});

document.getElementById('unsubscribeForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const statusEl = document.getElementById('unsubscribeStatus');
  statusEl.textContent = 'Unsubscribing…';

  const formData = new FormData(this);

  try {
    const res = await fetch(this.action, { method: 'POST', body: formData });
    const json = await res.json();
    statusEl.textContent = json.message;
    statusEl.className = json.success
      ? 'mt-4 text-green-500'
      : 'mt-4 text-red-500';
  } catch (err) {
    statusEl.textContent = 'Something went wrong.';
    statusEl.className = 'mt-4 text-red-500';
  }
});
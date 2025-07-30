document.getElementById('subscribeForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const statusEl = document.getElementById('statusMsg');
  statusEl.textContent = 'Sending…';
  // gather the form data
  const formData = new FormData(this);
  try {
    const res = await fetch(this.action, { method: 'POST', body: formData });
    const json = await res.json();
    statusEl.textContent = json.message;
    statusEl.className = json.status === 'success'
      ? 'mt-4 text-green-400'
      : 'mt-4 text-red-400';
  } catch(err) {
    statusEl.textContent = 'An error occurred';
    statusEl.className = 'mt-4 text-red-400';
  }
});

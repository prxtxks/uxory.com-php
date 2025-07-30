document.getElementById('contactForm').addEventListener('submit', function(event) {
    let valid = true;
    const inputs = this.querySelectorAll('input, textarea, select');

    inputs.forEach(input => {
        if (!input.value.trim()) {
            valid = false;
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    const phoneInput = document.getElementById('phone');
    const digitsOnly = phoneInput.value.replace(/\D/g, '');

    if (digitsOnly.length < 7) {
        valid = false;
        phoneInput.classList.add('error');
        alert('Please enter a valid phone number with at least 7 digits.');
    } else {
        phoneInput.classList.remove('error');
    }

    if (!valid) {
        event.preventDefault();
        alert('Please fill in all fields correctly.');
    }
});
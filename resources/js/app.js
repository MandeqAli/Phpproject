import './bootstrap';
document.getElementById('contactForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const formStatus = document.getElementById('formStatus');

    const data = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        message: document.getElementById('message').value
    };

    // UI Feedback
    submitBtn.innerText = 'Sending...';
    submitBtn.disabled = true;
    formStatus.innerText = '';
    formStatus.className = 'status-msg';

    try {
        const response = await fetch('../api/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (result.success) {
            formStatus.innerText = result.message;
            formStatus.classList.add('success');
            document.getElementById('contactForm').reset();
        } else {
            formStatus.innerText = result.message;
            formStatus.classList.add('error');
        }
    } catch (error) {
        console.error('Submission Error:', error);
        formStatus.innerText = 'Something went wrong. Please try again.';
        formStatus.classList.add('error');
    } finally {

        submitBtn.innerText = 'Send Message';
        submitBtn.disabled = false;
    }
});

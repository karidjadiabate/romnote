// debut Inscription
document.getElementById('registrationForm').addEventListener('submit', function (event) {

    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

    const fieldIds = ['firstName', 'lastName', 'contact', 'email', 'schoolName', 'schoolAddress', 'password', 'confirmPassword', 'rememberMe'];
    let isValid = true;

    fieldIds.forEach(id => {
        const field = document.getElementById(id);
        field.classList.remove('is-invalid');
        const value = field.value.trim();

        if (id === 'contact' && !/^\d+$/.test(value)) {
            isValid = setInvalid(field);
        } else if (id === 'email' && !validateEmail(value)) {
            isValid = setInvalid(field);
        } else if (id === 'rememberMe' && !field.checked) {
            isValid = setInvalid(field);
        } else if (value === '') {
            isValid = setInvalid(field);
        }
    });

    if (!isValid) {
        event.preventDefault(); // Empêche la soumission du formulaire si des champs sont invalides
    }
});

function setInvalid(field) {
    field.classList.add('is-invalid');
    return false;
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

document.querySelectorAll('.toggle-password').forEach(item => {
    item.addEventListener('click', function () {
        const input = document.getElementById(this.getAttribute('data-toggle'));
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
{/* fin inscription */ }


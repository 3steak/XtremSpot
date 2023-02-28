//  JS HOMECTRL

let togglePassword = document.querySelector('#togglePassword');
let password = document.getElementById('password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    let type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    let icon = togglePassword.getAttribute('class') === 'fa-regular fa-eye' ? 'fa fa-eye-slash' : 'fa-regular fa-eye';
    togglePassword.setAttribute('class', icon);
});

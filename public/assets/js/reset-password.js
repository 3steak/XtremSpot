console.log('coucou');
const resetPasswordForm = document.getElementById('reset-password-form');

resetPasswordForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const email = resetPasswordForm.email.value;

    fetch('/controllers/passwordLost/verifMailCtrl.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email })
    })
        .then(response => {
            if (response.ok) {
                console.log('response ok ');
                return;
                return response.json();
            } else {
                throw new Error('Erreur lors de la récupération du mot de passe.');
            }
        })
        .then(data => {
            // Rediriger l'utilisateur vers la page de validation du code
            window.location.href = `/controllers/passwordLost/validateCodeCtrl.php?email=${email}`;
        })
        .catch(error => {
            console.error(error);
        });
});
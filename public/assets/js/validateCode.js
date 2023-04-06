// Récupération de l'élément de formulaire et ajout d'un événement submit
let form = document.getElementById('validate-code-form');
console.log('coucou');
form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Récupération du code 
    let code = document.getElementById('code').value;

    // Envoi du code en  POST 
    fetch('/controllers/passwordLost/validateCodeCtrl.php', {
        method: 'POST',
        body: JSON.stringify({ code }),
        headers: {
            'Content-Type': 'application/json'
        }
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
            // Redirection vers page modification du password
            window.location.href = `/controllers/passwordLost/resetPasswordCtrl.php`;
        })

});
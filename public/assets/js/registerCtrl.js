
//---------------------------   PASSWORD   -------------------------------------------

// force1 maj min 8 characters
let rePasswordforce1 = new RegExp("^(?=.*[a-z])(?=.*[A-Z])");
// force 2 maj min 0-9  8 characters
let rePasswordforce2 = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])");
// force 3 maj min 0-9 8 characters && @
let rePasswordforce3 = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])");



let lastname = document.getElementById('lastname');
let firstname = document.getElementById('firstname');
let postalcode = document.getElementById('postalcode');
let nativecountry = document.getElementById('nativeCountry');


//  Display .help a l'entrée du password

let password = document.getElementById('password');
let confirmPassword = document.getElementById('confirmPassword');
let passwordHelp = document.getElementById('passwordHelp');
let passwordforce = document.getElementById('passwordforce');
let passwordDif = document.getElementById('passwordDif');

password.addEventListener("focus", () => {
    passwordHelp.classList.remove("d-none");
})

//  ENVOI HTML SI MATCH AVEC DIFFERENTE REGEX
// Revoir la condition
let testPassword = () => {
    if (rePasswordforce3.test(password.value)) {
        passwordforce.innerHTML = "Ton mot de passe est parfait";
    } else if (rePasswordforce2.test(password.value)) {
        passwordforce.innerHTML = "Humm yes ok";
    } else {
        passwordforce.innerHTML = "Mot de passe insuffisant";
    }
};

//  ENVOI HTML SI PASSWORD = PASSWORD ou non 
let diffpassword = () => {
    if (password.value === confirmPassword.value) {
        passwordDif.innerHTML = "Mots de passes identiques";
    } else {
        passwordDif.innerHTML = "Veuillez rentrer le même mot de passe";
    }
}

//  TEST PASSWORD FORCE AND PASSWORD = PASSWORD
confirmPassword.addEventListener('input', (e) => {
    diffpassword();
})
password.addEventListener('input', (e) => {
    testPassword();
})


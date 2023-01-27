
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





// --------------MODAL REPORT.PHP for mail after delete in signalement   ------------------
const deleteMailModal = document.getElementById('deleteMailModal')
deleteMailModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const userName = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = deleteMailModal.querySelector('.modal-title')


    const modalForm = deleteMailModal.querySelector('.modal-body')

    modalTitle.textContent = `Mail pour ${userName}`
    // I WILL CHANGE VALUE OF MAILTO "user.mail"

    let formMail = ` 
    <!-- Wrapper container -->
    <div class="container py-4">
    
      <!-- Bootstrap 5 starter form -->
      <form id="contactForm">
    
        <!-- Name input -->
        <div class="mb-3">
          <label class="form-label" for="name">Name</label>
          <input class="form-control" id="name" type="text" placeholder="Name" value="${userName}"/>
        </div>
    
        <!-- Email address input -->
        <div class="mb-3">
          <label class="form-label" for="emailAddress">Email Address</label>
          <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" value="${userName}.email"/>
        </div>
    
        <!-- Message input -->
        <div class="mb-3">
          <label class="form-label" for="message">Message</label>
          <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
        </div>
    
        <!-- Form submit button -->
        <div class="d-grid">
          <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        </div>
    
      </form>
    
    </div>
    
    `;

    modalForm.innerHTML = formMail
})
//  -----------------------------------------------------------------------------------------------


//------------------------ MODAL FOR IFRAME FEEDUSER.PHP -----------------------------------------

const mapModal = document.getElementById('mapModal')
mapModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')

    // Update the modal's content.
    const modalTitle = mapModal.querySelector('.modal-title')
    const modalMapIframe = mapModal.querySelector('.modal-body')

    modalTitle.textContent = `Lieu du spot de ${recipient}`
    // CHANGE VALUE OF USER'S MAP  "user.map"

    let mapUser = `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46178.46023411916!2d-1.4276854845947582!3d43.665771804924276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd515c8004bdbfb5%3A0x10366902fd13eac9!2sLa%20Graviere!5e0!3m2!1sen!2sfr!4v1672045459326!5m2!1sen!2sfr"
width="auto" height="300" style="border:0;"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;

    modalMapIframe.innerHTML = mapUser
})

// -------------------------------------------------------------------------------

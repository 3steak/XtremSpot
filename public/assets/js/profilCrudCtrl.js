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


//------------------------ MODAL FOR DESCRIPTION FEEDUSER.PHP -----------------------------------------

let seeMores = document.querySelectorAll('.seeMore');

for (let seeMore of seeMores) {
    seeMore.addEventListener('click', persoModal)

}
function persoModal() {
    // Attributs data
    let title = this.dataset.title;
    let description = this.dataset.description;
    console.log('oui');
    // Injection in modal
    document.querySelector("#description .description").innerText = description;

}

// Récupération des data-set pour SUPPRESSION PUBLICATION
let trashes = document.querySelectorAll('.deleteApt');

for (let trash of trashes) {
    trash.addEventListener('click', persoModal)
}
function persoModal() {
    // Attributs data
    let id = this.dataset.id;
    let name = this.dataset.name;

    // Injection in modal
    document.querySelector("#validateModal .fullname").innerText = name;
    let link = document.querySelector("#linkDelete");
    let href = link.getAttribute('href');
    link.setAttribute('href', href + id)
}


// Récupération des data - set pour SUPPRESSION COMMENT
let trashesComment = document.querySelectorAll('.deleteComment');
for (let trashComment of trashesComment) {
    trashComment.addEventListener('click', modalComment)
}
function modalComment() {
    // Attributs data

    let idComment = this.dataset.idcomment;
    let pseudo = this.dataset.pseudo;

    // Injection in modal
    document.querySelector("#deleteComment .pseudo").innerText = pseudo;
    let link = document.querySelector("#linkDeleteComment");
    let href = link.getAttribute('href');
    link.setAttribute('href', href + idComment)
}



//  ENLEVE LE DISABLE DU FORM PROFILPATIENT

let button = document.querySelector('.triggerUdpdate');
let fieldset = document.querySelector('fieldset');

button.addEventListener('click', (event) => {
    if (fieldset.hasAttribute('disabled')) {
        fieldset.removeAttribute('disabled');
    } else {
        fieldset.setAttribute('disabled', 'disabled');
    }
});


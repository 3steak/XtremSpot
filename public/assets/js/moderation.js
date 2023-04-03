// Récupération des data-set pour REFUS COMMENT
let buttons = document.querySelectorAll('.refuseComment');
for (let trash of buttons) {
    trash.addEventListener('click', persoModal)
}
function persoModal() {
    // Attributs data
    let id = this.dataset.id;
    let email = this.dataset.email;


    // Injection in modal
    let link = document.querySelector("#linkDeleteComment");
    let inputEmail = document.querySelector('.emailComment');
    let action = '/controllers/dashboard/deleteCommentCrudCtrl.php?id=';
    link.setAttribute('action', action + id);
    inputEmail.value = email;
}

// Récupération des data-set pour REFUS PUBLICATION
let buttonsRefuse = document.querySelectorAll('.refusePublication');
for (let trash of buttonsRefuse) {
    trash.addEventListener('click', persoModal)
}
function persoModal() {
    // Attributs data
    let id = this.dataset.id;
    let email = this.dataset.email;

    // Injection in modal
    let link = document.querySelector("#linkDeletePublication");
    let inputEmail = document.querySelector('.emailPublication');
    let action = '/controllers/dashboard/deletePublicationCrudCtrl.php?id=';
    link.setAttribute('action', action + id);
    inputEmail.value = email;
}

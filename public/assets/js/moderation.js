// Récupération des data-set pour SUPPRESSION
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
    let action = '/controllers/dashboard/deleteCommentCtrl.php?id=';
    link.setAttribute('action', action + id);
    inputEmail.value = email;
}

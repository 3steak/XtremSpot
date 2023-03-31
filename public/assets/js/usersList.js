$(document).ready(function () {
    $('#dataTable').DataTable({
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucun patient ou rendez-vous enregistré",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    }
    );
});

// Récupération des data-set pour SUPPRESSION
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
    let href = '/controllers/dashboard/deleteUserCtrl.php?id=';
    link.setAttribute('href', href + id)
}

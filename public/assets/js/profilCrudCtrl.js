//------------------------ MODAL FOR MAP FEEDUSER.PHP -----------------------------------------

let pings = document.querySelectorAll('.ping');
for (let ping of pings) {
    ping.addEventListener('click', mapModal)
}
let map = "";

// Function faire passer les id
function mapModal() {

    if (map !== '') {
        map.off();
        map.remove();

    }
    let pseudo = this.dataset.pseudo;
    let title = this.dataset.title;
    let latitude = this.dataset.marker_latitude;
    let longitude = this.dataset.marker_longitude;

    // Injection in modal
    document.querySelector("#mapModal .pseudo").innerText = pseudo;

    function init() {   // Création de mon ping personnalisé
        var myIcon = L.icon({
            iconUrl: '/../public/assets/img/surf.png',
            iconSize: [40, 40],
            popupAnchor: [0, -30],
        });
        // Coordonnés de ma ville
        const town = {
            lat: latitude,
            lng: longitude
        }
        // lvl du zoom sur la ville 
        const zoomLevel = 15;

        //  "L" est un objeto
        // J'utilise ses methodes 
        map = L.map('mapid').setView([town.lat, town.lng], zoomLevel);

        const mainLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });
        // AJout du layer a la map(MAPID dans le html)
        mainLayer.addTo(map);

        // Le titre de publication

        // //  ajout marker
        let marker = L.marker([town.lat, town.lng], { icon: myIcon }).bindPopup("<small>" + title + "</small > ").addTo(map);

        // fin fonction init
    }
    setTimeout(() => {
        init();
    }, "300");
}



//------------------------ MODAL FOR DESCRIPTION FEEDUSER.PHP -----------------------------------------

let seeMores = document.querySelectorAll('.seeMore');
for (let seeMore of seeMores) {
    seeMore.addEventListener('click', descModal)
}
function descModal() {
    // Attributs data
    let titledesc = this.dataset.titledesc;
    let description = this.dataset.description;

    // Injection in modal
    document.querySelector("#description .description").innerText = description;
    document.querySelector('#description #descriptionLabel').innerText = titledesc;

}


// ---------------------- SUPPRESSION PUBLICATION  ----------------------------------------
let trashes = document.querySelectorAll('.deleteApt');
for (let trash of trashes) {
    trash.addEventListener('click', persoModal)
}

// Function faire passer les id
function persoModal() {
    // Attributs data
    let id = this.dataset.id;
    let email = this.dataset.email;
    // Injection in modal
    let link = document.querySelector("#linkDeletePublication");
    let inputEmail = document.querySelector('.emailPublication');
    let action = '/controllers/dashboard/deletePublicationCrudProfilCtrl.php?id=';
    link.setAttribute('action', action + id);
    inputEmail.value = email;

}


// -------------------------------- SUPPRESSION COMMENT-------------------------------
let trashesComment = document.querySelectorAll('.deleteComment');
for (let trashComment of trashesComment) {
    trashComment.addEventListener('click', modalComment)
}
function modalComment() {
    // Attributs data
    let idComment = this.dataset.idcomment;
    let email = this.dataset.email;

    console.log(email);

    // Injection in modal
    let link = document.querySelector("#linkDeleteComment");
    let inputEmail = document.querySelector('.emailComment');
    let action = '/controllers/dashboard/deleteCommentCrudProfilCtrl.php?id=';
    link.setAttribute('action', action + idComment);
    inputEmail.value = email;
}







// ------- LIVE COMMENT--------------------

$(document).ready(function () {
    let submits = document.querySelectorAll('.submitButton');
    for (let submit of submits) {
        // je recupere l'id dans le submit (submit.id)
        submit.addEventListener('click', () => {
            // PostComment
            //  `#idPublications${id}` pour récupérer id dans submit 
            let idPublications = document.querySelector(`#idPublications${submit.id}`).value;
            let description = document.querySelector(`#comment${submit.id}`).value;
            if (description != "" && idPublications != "") {
                $.ajax({
                    url: "/config/liveComment.php",
                    method: "POST",
                    data: "idPublication=" + idPublications + "&description=" + description
                });
            }

            // vider le textaera

            document.querySelector(`#comment${submit.id}`).value = "COMMENTAIRE ENVOYE ";

            setTimeout(() => {
                document.querySelector(`#comment${submit.id}`).value = "";
                document.querySelector(`.accordion-collapse${submit.id}`).classList.remove('show');
            }, "500")
            // fermer le collapse
        })
    }

    // ------- LIVE LIKES --------------------

    document.querySelectorAll('.like-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            //Récupération de l'identifiant de la publication
            let publicationId = btn.dataset.publicationId;
            if (publicationId != "") {
                $.ajax({
                    url: "/config/liveLike.php",
                    method: "GET",
                    data: "publicationId=" + publicationId,
                    success: function () {
                        let countLikeBefore = btn.parentNode.querySelectorAll('.countLike');
                        // string to int
                        let likesCount = parseInt(countLikeBefore[0].innerText);
                        // incrémentation
                        countLikeBefore[0].innerText = likesCount + 1;
                    }
                });
            }
        });
    });


});

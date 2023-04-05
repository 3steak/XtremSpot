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

            document.querySelector(`#comment${submit.id}`).value = "COMMENTAIRE ENVOYE EN MODERATION ";

            setTimeout(() => {
                document.querySelector(`#comment${submit.id}`).value = "";
                document.querySelector(`.accordion-collapse${submit.id}`).classList.remove('show');
            }, "1000")
            // fermer le collapse
        })
    }

    // ------- LIVE LIKES --------------------

    // Création variable pour stocker les publications likés par user
    let likedPublications = [];
    document.querySelectorAll('.like-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            //Récupération de l'identifiant de la publication
            let publicationId = btn.dataset.publicationId;
            // control si user a deja aimé
            if (likedPublications.includes(publicationId)) {
                // Je stop le script 

                return;
            }

            if (publicationId != "") {
                fetch('/config/liveLike.php?id=' + publicationId)
                    .then(response => {
                        return (response.json())
                            .then(data => {
                                if (data == '0') {
                                    return;
                                }
                                // Ajout idPublication dans tableau
                                likedPublications.push(publicationId);
                                let countLikeBefore = btn.parentNode.querySelectorAll('.countLike');
                                // string to int
                                let likesCount = parseInt(countLikeBefore[0].innerText);
                                // incrémentation
                                countLikeBefore[0].innerText = likesCount + 1;
                            })
                    })
                // fin si idpublication est pas vide
            }
        });
    });




    //  DELETE PUBLICATION
    let buttonsDltPublication = document.querySelectorAll('.deletePublication');
    for (let trash of buttonsDltPublication) {
        trash.addEventListener('click', deletePub)
    }
    function deletePub() {
        // Attributs data
        let id = this.dataset.idpublication;
        console.log(id);
        // Injection in modal
        let link = document.querySelector("#linkDeletePublication");
        let action = '/controllers/deletePublicationCtrl.php?id=';
        link.setAttribute('action', action + id);
    }


    //  DELTE COMMENT
    let buttons = document.querySelectorAll('.deleteComment');
    for (let trash of buttons) {
        trash.addEventListener('click', persoModal)
    }
    function persoModal() {
        // Attributs data
        console.log('coucou');
        let id = this.dataset.id;

        // Injection in modal
        let link = document.querySelector("#linkDeleteComment");
        let action = '/controllers/deleteCommentCtrl.php?id=';
        link.setAttribute('action', action + id);
    }


    // LIVE ADD TO FAVORITE
    document.querySelectorAll('.favoriteBtn').forEach(function (btn) {
        btn.addEventListener('click', function (event) {
            event.preventDefault()
            //Récupération de l'identifiant de la publication
            let publicationId = btn.dataset.publicationId;
            // control si user a deja aimé


            if (publicationId != "") {
                fetch('/config/liveFavorite.php?id=' + publicationId)
                    .then(response => {
                        return (response.json())
                            .then(data => {
                                if (data == '0') {
                                    // METTRE BOOKMARK EN VIDE 
                                    btn.classList.add('fa-regular')
                                    btn.classList.remove('fa-solid')
                                    return;
                                }
                                // METTRRE BOOKMARK EN SOLID
                                btn.classList.add('fa-solid')
                                btn.classList.remove('fa-regular')
                            })
                    })
                // fin si idpublication est pas vide
            }
        });
    });


    // fin document ready
});



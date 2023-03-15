//------------------------ MODAL FOR IFRAME FEEDUSER.PHP -----------------------------------------
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
    }, "10");

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
    let name = this.dataset.name;

    // Injection in modal
    document.querySelector("#validateModal .fullname").innerText = name;
    let link = document.querySelector("#linkDelete");
    let href = link.getAttribute('href');
    href = href.substring(0, href.length - 1)

    link.setAttribute('href', href + id)

}


// -------------------------------- SUPPRESSION COMMENT-------------------------------
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
    href = href.substring(0, href.length - 1)

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


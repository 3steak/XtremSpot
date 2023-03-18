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




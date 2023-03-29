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




//  JQUERY LIVE SEARCH

$(document).ready(function () {
    $("#form").submit(function () {


        // inputsearch
        let input = $(this).val();
        if (input != "") {

            $.ajax({
                url: "/../config/liveComment.php",
                method: "POST",
                data: { input: input },

                success: function (data) {
                    let html = `<table class="table table-bordered table-striped mt-4 neumorphic">
                                    <thead>
                                            <tr class="">
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Actions</th>
                                            </tr>
                                    </thead>
                                    <tbody>`

                    if (data) {
                        appointments = JSON.parse(data);

                        jQuery.each(appointments, function (key, appointment) {
                            let date = new Date(appointment.dateHour);
                            let year = date.getFullYear();
                            let month = date.getMonth() + 1;
                            month = month < 10 ? '0' + month : month;
                            let day = date.getDate();
                            day = day < 10 ? '0' + day : day;

                            let hour = date.getHours();
                            let minute = date.getMinutes();
                            minute = minute < 10 ? '0' + minute : minute;

                            html += `
                                   LE HTML SANS LE COMMENTAIRE
                                    `
                        })
                        html += `</tbody>
                                        </table >
                                        <div class="modal fade" id="livesearchModal" tabindex="-1" aria-labelledby="validateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="validateModalLabel">Suppression du rendez-vous</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Supprimer le rendez-vous de <span class="fullname"></span> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a class="btn btn-primary" id="linkDelete" href="/DeleteAppointment?id=" role="button">Supprimer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`
                    }
                    $('#searchresult').html(html);
                }
            });
        }
    })
});

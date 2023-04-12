// Waiting for DOM
$(document).ready(function () {
    const apiKey = '843d40633ae05dcf366e7d2c05300f90';

    const format = '&format=json';
    let regexZipcode = /^[0-9]{5}$/;
    let zipcode = $('#zipcode');
    let city = $('#town');
    let errorMessage = $('#error-message');
    let hiddenInput = $('#hiddenInput');
    let map = '';

    $(zipcode).on('blur', function () {
        if (map !== '') {
            map.off();
            map.remove();
        }

        // this refers to zipcode input 
        let code = $(this).val();
        // URL for api with code and apiKey added
        let url = 'http://api.openweathermap.org/geo/1.0/zip?zip=' + code + ',FR&appid=' + apiKey;
        // Send request to API
        fetch(url, { method: 'get' })
            .then(response => response.json())
            .then(result => {
                $(city).find('option').remove();
                // if result != empty, add with append <option value... 
                if (result.code !== '') {
                    $(city).append('<option value ="' + result.name + '">' + result.name + '</option>');
                    //  refaire une requete API a  openweather avec result.name
                    function init() {
                        if (code.match(regexZipcode) === null) {
                            $(errorMessage).text('Rentrer un code postal').show();
                            result.lat = 48.8534;
                            result.lon = 2.3488;
                            setTimeout(() => {
                                $(errorMessage).text('').hide();
                            }, "2000");
                        }
                        // Création de mon ping personnalisé

                        var myIcon = L.icon({
                            iconUrl: '/../public/assets/img/surf.png',
                            iconSize: [40, 40],
                            popupAnchor: [0, -30],
                        });
                        // Coordonnés de ma ville
                        const town = {
                            lat: result.lat,
                            lng: result.lon
                        }
                        // lvl du zoom sur la ville 
                        const zoomLevel = 12;

                        //  "L" est un objet
                        // J'utilise ses methodes 
                        map = L.map('mapid').setView([town.lat, town.lng], zoomLevel);

                        const mainLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        });
                        // AJout du layer a la map(MAPID dans le html)
                        mainLayer.addTo(map);


                        // //  ajout marker
                        var marker = L.marker([], { icon: myIcon });

                        // Le titre de publication
                        let content = " Ton titre se retrouvera ici ";

                        function onMapClick(e) {
                            marker
                                .setLatLng(e.latlng)
                                .bindPopup("<small>" + content + "<br>" + e.latlng + "</small>")
                                .addTo(map);
                            $(hiddenInput).val(e.latlng);
                        }
                        map.on('click', onMapClick);
                        // fin fonction init
                    }
                    init();

                    // if result empty show error message
                } else {
                    if ($(zipcode).val()) {
                        $(errorMessage).text('Aucune commmune avec ce code postal.').show();
                    }
                    else {
                        $(errorMessage).text('').hide();
                    }
                }
            })
            // if catch errors, remove town
            .catch(err => {
                $(city).find('option').remove();
            });
    });
});
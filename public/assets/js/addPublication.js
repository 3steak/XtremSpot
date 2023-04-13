// Waiting for DOM
$(document).ready(function () {
    //  key for geocoding api 
    const apiKey = '843d40633ae05dcf366e7d2c05300f90';

    const format = '&format=json';
    let regexZipcode = /^[0-9]{5}$/;

    // listeners
    let zipcode = $('#zipcode');
    let city = $('#town');
    let errorMessage = $('#error-message');
    let hiddenInput = $('#hiddenInput');
    let map = '';

    $(zipcode).on('blur', function () {
        // remove previous map
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
            // parse the body text as JSON
            .then(response => response.json())
            .then(result => {
                // remove option before add it again
                $(city).find('option').remove();
                // if result != empty, add with append <option value... 
                if (result.code !== '') {
                    $(city).append('<option value ="' + result.name + '">' + result.name + '</option>');
                    //  refaire une requete API a openweather avec result.name

                    // function init to add map 
                    function init() {
                        // if not match with RegexZipcode
                        if (code.match(regexZipcode) === null) {
                            $(errorMessage).text('Rentrer un code postal').show();
                            // latitude longitude by default => Paris
                            result.lat = 48.8534;
                            result.lon = 2.3488;
                            setTimeout(() => {
                                $(errorMessage).text('').hide();
                            }, "2000");
                        }

                        // Creating personal  ping 
                        var myIcon = L.icon({
                            iconUrl: '/../public/assets/img/surf.png',
                            iconSize: [40, 40],
                            popupAnchor: [0, -30],
                        });
                        // Coordinate of my town
                        const town = {
                            lat: result.lat,
                            lng: result.lon
                        }
                        // lvl of zoom on my town
                        const zoomLevel = 12;

                        //  "L" is an object
                        // I use his Method
                        // Config and create the Map
                        map = L.map('mapid').setView([town.lat, town.lng], zoomLevel);

                        // To have layers (les tuiles)
                        const mainLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        });
                        // Add layer to map(MAPID dans le html)
                        mainLayer.addTo(map);

                        // //  create marker
                        var marker = L.marker([], { icon: myIcon });

                        // title of publication
                        let content = " Ton titre se retrouvera ici ";

                        // function for ping
                        function onMapClick(e) {
                            marker
                                .setLatLng(e.latlng)
                                .bindPopup("<small>" + content + "<br>" + e.latlng + "</small>")
                                .addTo(map);

                            // add latlng to hidden input
                            $(hiddenInput).val(e.latlng);
                        }
                        map.on('click', onMapClick);
                        // end for function init
                    }
                    // use init
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
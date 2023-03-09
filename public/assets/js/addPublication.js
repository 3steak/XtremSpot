// Waiting for DOM
$(document).ready(function () {
    const apiURL = 'https://geo.api.gouv.fr/communes?codePostal=';
    const format = '&format=json';

    let zipcode = $('#zipcode'); let city = $('#town'); let errormessages = $('#error-message');

    $(zipcode).on('blur', function () {
        // this refers to zipcode input 
        let code = $(this).val();
        let url = apiURL + code + format;

        // Send request to API
        fetch(url, { method: 'get' }).then(response => response.json()).then(results => {
            $(city).find('option').remove();
            if (results.length) {
                $.each(results, function (key, value) {
                    $(city).append('<option value ="' + value.nom + '">' + value.nom + '</option>');
                });
            } else {
                if ($(zipcode).val()) {
                    console.log('Erreur de code postal.');
                    $(errorMessage).text('Aucune commmune avec ce code postal.').show();
                }
                else {
                    $(errorMessage).text('').hide();
                }
            }
        }).catch(err => {
            console.log(err);
            $(city).find('option').remove();
        });
    });
});
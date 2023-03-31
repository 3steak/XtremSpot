<?php

// ********************   CONSTANT DB   *******************

// Adresse de la base
define('DB_HOST', '127.0.0.1');

// Nom de la base de données
define('DB_NAME', 'testXtremspot');

// Nom de l'utilisateur MySQL
define('DB_USER', 'root');

// Mot de passe de l'utilisateur
define('DB_PASS', '');



// ********************   REGEXP   *******************

// PHONE 
define('REGEXP_PHONE_NUMBER', '^(0[1-9]{1})(\d{8})$');

// IMAGE FORMAT
define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);

// EXTENSION
define('EXTENSION', ['image/jpeg', 'image/png']);

// POIDS 
define('MAX_FILESIZE', 15728640);

// ZIPCODE
define('REGEX_ZIPCODE', '^[0-9]{5}$');

// TEXT
define("REGEX_NO_NUMBER", "^[a-zA-ZÀ-ÿ' \-]{2,20}$");


// BITHDAY
define('REGEXP_BIRTHDAY', "^((19\d{2}|20[01]\d|202[1-3])\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01]))$");

// LATLNG
define('REGEXP_LATLNG', "/LatLng\(([-]?\d+\.\d+), ([-]?\d+\.\d+)\)/");

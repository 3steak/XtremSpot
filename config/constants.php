<?php // REGEX TEXT
define("REGEX_NO_NUMBER", "^[a-zA-ZÀ-ÿ' \-]{2,20}$");
// REGEX LINKEDIN
// Linkedin moins restrictive
define('REGEXP_LINKEDIN', "^https:\/\/www.linkedin.com\/in\/([a-z]+)-([a-z]+)-([a-z0-9]+)\/$");

// Birthday
define('REGEXP_BIRTHDAY', "^((19\d{2}|20[01]\d|202[1-3])\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01]))$");
// test format fichier
define('EXTENSION', ['image/jpeg', 'image/png']);

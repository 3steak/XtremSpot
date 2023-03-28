<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../models/User.php');

//  APRES COPIER COLLER DU LIEN
$email = trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL));
$isValidatedOk = User::validateMail($email);
if ($isValidatedOk) {
    flash('register', 'Ton compte vient d\'être validé ! Tu peux maintenant te connecter', FLASH_SUCCESS);

    header('location: /controllers/homeCtrl.php?register=validated');
} else {
    flash('register', 'Ton compte n\'a pas été validé, vérifie le lien envoyé par mail', FLASH_WARNING);
    header('location: /controllers/homeCtrl.php?register=NoValidated');
}

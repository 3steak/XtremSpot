<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
if (!empty($_GET) && $_GET['register'] == 'ok') {
    flash('register');
}

// pour verif le password : 
//  password_verify ($POST[password], $password)
// $verified = password_verify('greatPassword1', $Pass1);
// True

// $verified = password_verify('wrongPassword1', $Pass1);
// False

//  PHP MAILER pour VERIF MAIL
$jsName = 'homeCtrl';
include_once(__DIR__ . '/../views/templates/headerHome.php');
include(__DIR__ . '/../views/home.php');
include_once(__DIR__ . '/../views/templates/footer.php');

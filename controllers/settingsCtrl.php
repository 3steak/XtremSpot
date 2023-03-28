<?php
session_start();
//  if not connected
if ($_SESSION['loggedIn'] != true) {
    header('location: /controllers/homeCtrl.php');
}
require_once(__DIR__ . '/../helpers/flash.php');
include_once(__DIR__ . '/../views/templates/header.php');
if (!empty($_GET) && $_GET['update'] == 'ok') {
    flash('updateOk');
}
include(__DIR__ . '/../views/settings.php');
include_once(__DIR__ . '/../views/templates/footer.php');

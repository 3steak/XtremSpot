<?php
session_start();
require_once(__DIR__ . '/../../helpers/flash.php');
//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
} else {
    include_once(__DIR__ . '/../../views/templates/header.php');

    // SET idUser WITH $_SESSION
    flash('welcome');
    include(__DIR__ . '/../../views/dashboard/CRUD.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
}

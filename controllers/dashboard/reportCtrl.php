<?php
session_start();
//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}
$jsName = 'reportCtrl';
include_once(__DIR__ . '/../../views/templates/header.php');
include(__DIR__ . '/../../views/dashboard/report.php');
include_once(__DIR__ . '/../../views/templates/footer.php');

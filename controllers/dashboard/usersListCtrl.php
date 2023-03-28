<?php
session_start();
//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}
$jsName = 'usersList';
require_once(__DIR__ . '/../../models/User.php');

try {
    $users = User::get();
} catch (\Throwable $th) {
    //throw $th;
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../../views/templates/header.php');
    include(__DIR__ . '/../../views/errors.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
    die;
}
include_once(__DIR__ . '/../../views/templates/header.php');
include(__DIR__ . '/../../views/dashboard/usersList.php');
include_once(__DIR__ . '/../../views/templates/footer.php');

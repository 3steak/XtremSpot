<?php
session_start();
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../helpers/db.php');
$jsName = 'feedUserCtrl';

var_dump(Database::connect());
// Tableau factice pour exemple
$sports = ['Skate', 'Roller', 'Bmx', 'Surf', 'Kitesurf', 'Paddle', 'Longboard', 'Bodyboard', 'Planche à voile'];
$towns  = ['Amiens', 'Reims', 'Rouen', 'Paris', 'Nantes'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $comment = trim((string) filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($comment)) {
        // $error["comment"] = '<small class="text-white mx-auto">Veuillez renseigner un commentaire</small>';
        flash('commentEmpty', 'Commentaire vide !', FLASH_WARNING);
    }
    if (empty($error)) {
        // Redirige au même endroit
    }
}

include_once(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/feedUser.php');
include_once(__DIR__ . '/../views/templates/footer.php');

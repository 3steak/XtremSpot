<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Publication.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../session.php');

$jsName = 'feedUserCtrl';


$idUser = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    if (User::isIdExist($idUser) === false) {
        throw new Exception("Cet utilisateur n'existe pas", 1);
    }
    $profilUser = User::get($idUser);
    $publications = Publication::getUserPublication($idUser);
    //  Si profilUser return false
    if (!$profilUser) {
        throw new Exception('Id non valide', 1);
    }
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

if (!empty($_GET) && isset($_GET['isSent']) == 'ok') {
    flash('formNewContentOk');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $comment = trim((string) filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($comment)) {
        // $error["comment"] = '<small class="text-white mx-auto">Veuillez renseigner un commentaire</small>';
        flash('commentEmpty', 'Commentaire vide !', FLASH_WARNING);
    }
    if (empty($error)) {
        // Redirige au même endroit
        // AJAX POUR COMMENT
    }
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/profilUser.php');
}


require_once(__DIR__ . '/../views/templates/footer.php');

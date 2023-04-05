<?php
session_start();
//  if not connected
if ($_SESSION['loggedIn'] != true) {
    header('location: /controllers/homeCtrl.php');
} else {
    // SET idUser WITH $_SESSION
    $idSession = $_SESSION['user']->id;
}

require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Publication.php');
require_once(__DIR__ . '/../models/Comment.php');

$jsName = 'feedUserCtrl';

if (!isset($_GET['isSent'])) {
    $idUser = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if (empty($_GET)) {
    $idUser = $_SESSION['user']->id;
    flash('formNewContentOk');
}



try {
    if (User::isIdExist($idUser) === false) {
        throw new Exception("Cet utilisateur n'existe pas", 1);
    }
    $profilUser = User::get($idUser);
    $publications = Publication::getUserPublication($idUser);
    $comments = Comment::getAll();

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


include_once(__DIR__ . '/../views/templates/header.php');

include_once(__DIR__ . '/../views/profilUser.php');
require_once(__DIR__ . '/../views/templates/footer.php');

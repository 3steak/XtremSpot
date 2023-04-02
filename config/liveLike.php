<?php
session_start();
if ($_SESSION['loggedIn'] != true) {
    header('location: /controllers/homeCtrl.php');
} else {
    // SET idUser WITH $_SESSION
    $idUser = $_SESSION['user']->id;
}
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Publication.php');
require_once(__DIR__ . '/../models/Like.php');


if (!empty($_GET['publicationId'])) {

    $idPublication = intval(filter_input(INPUT_GET, 'publicationId', FILTER_SANITIZE_NUMBER_INT));

    try {
        $like = new Like;
        $like->setIdPublications($idPublication);
        $like->setIdUsers($idUser);
        $result = $like->addLikes($idUser, $idPublication);
        if ($result) {
            # INCREMENTATION
        } else {
            # like existe deja
        }
    } catch (\Throwable $th) {
        var_dump($errorMsg = $th->getMessage());
        die;
    }
} else {
    var_dump($error);
    die;
}

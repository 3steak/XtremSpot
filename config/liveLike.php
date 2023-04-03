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




$idPublication = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    $like = new Like;
    $like->setIdPublications($idPublication);
    $like->setIdUsers($idUser);
    $result = $like->addLikes($idUser, $idPublication);
    if ($result) {
        # INCREMENTATION
        $response = 1;
        echo (json_encode($response));
    } else {
        # like existe deja
        $response = 0;
        echo (json_encode($response));
    }
} catch (\Throwable $th) {
    var_dump($errorMsg = $th->getMessage());
    die;
}

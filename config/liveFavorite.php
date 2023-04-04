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
require_once(__DIR__ . '/../models/Favorite.php');




$idPublication = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    $like = new Favorite;
    $like->setIdPublications($idPublication);
    $like->setIdUsers($idUser);
    $result = $like->addFavorites($idUser, $idPublication);
    if ($result) {
        # BOOKMARK SOLID
        $response = 1;
        echo (json_encode($response));
    } else {
        #FAV EXISTANT DONC DELETE
        $favorite = Favorite::getOne($idUser, $idPublication);
        Favorite::delete($favorite->id);
        # BOOKMARK REGULAR 
        $response = 0;
        echo (json_encode($response));
    }
} catch (\Throwable $th) {
    var_dump($errorMsg = $th->getMessage());
    die;
}

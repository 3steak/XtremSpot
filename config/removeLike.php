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
    # like existe deja donc delete 
    $like = Like::getOne($idUser, $idPublication);

    $result = Like::delete($like->id, $idPublication);
    if ($result) {
        $response = 0;
        echo (json_encode($response));
    }
} catch (\Throwable $th) {
    var_dump($errorMsg = $th->getMessage());
    die;
}

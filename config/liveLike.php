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


if (!empty($_GET['publicationId'])) {

    //  FILTRE COMMENTAIRE ET IDS

    $idPublication = intval(filter_input(INPUT_GET, 'publicationId', FILTER_SANITIZE_NUMBER_INT));

    try {
        $publication = new Publication;
        $publication->setId($idPublication);
        $result = $publication->addLikes();

        if (!$result) {
            throw new Exception("Commentaire non ajouté", 1);
            die;
        }
    } catch (\Throwable $th) {

        var_dump($errorMsg = $th->getMessage());
        die;
    }
} else {
    var_dump($error);
    die;
}

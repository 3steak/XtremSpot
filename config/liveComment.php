<?php
session_start();
if ($_SESSION['loggedIn'] != true) {
    header('location: /controllers/homeCtrl.php');
} else {
    // SET idUser WITH $_SESSION
    $idUser = $_SESSION['user']->id;
}
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Comment.php');


if (!empty($_POST['description']) && !empty($_POST['idPublication'])) {

    //  FILTRE COMMENTAIRE ET IDS

    $idPublications = intval(filter_input(INPUT_POST, 'idPublication', FILTER_SANITIZE_NUMBER_INT));

    $description = trim((string) filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($description)) {
        $error["comment"] = '<small class="text-white mx-auto">Veuillez renseigner un commentaire</small>';
    }


    if (empty($error)) {
        try {
            $comment = new Comment;
            $comment->setDescription($description);
            $comment->setIdPublications($idPublications);
            $comment->setIdUsers($idUser);

            $result = $comment->addComments();
            var_dump($result);
            die;
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
} else {
    var_dump('nopost');
    die;
}

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
var_dump($_POST);
die;
if (!empty($_POST['description']) && !empty($_POST['idPublications'])) {

    //  FILTRE COMMENTAIRE ET IDS

    $idPublications = intval(filter_input(INPUT_POST, 'idPublications', FILTER_SANITIZE_NUMBER_INT));

    $description = trim((string) filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));



    // DISPLAY ERROR IF EMPTY COMMENT
    if (!empty($_POST['comment'])) {
        $comment = trim((string) filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($comment)) {
            $error["comment"] = '<small class="text-white mx-auto">Veuillez renseigner un commentaire</small>';
        }
    }

    if (empty($error)) {
        try {
            $comment = new Comment;
            $comment->setDescription($description);
            $comment->setIdPublications($idPublications);
            $comment->setIdUsers($idUsers);

            $result = $comment->addComments();
            if (!$result) {
                throw new Exception("Commentaire non ajouté", 1);
                die;
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    } else {
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/feedUser.php');
    }
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/feedUser.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');

<?php
session_start();
//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}
$jsName = 'moderation';

require_once(__DIR__ . '/../../models/Publication.php');
require_once(__DIR__ . '/../../models/Comment.php');



try {
    $publications = Publication::getCrudPublications();
    $comments = Comment::getNoValidatedComments();
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../../views/templates/header.php');
    include(__DIR__ . '/../../views/error.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
    die;
}

// IF ACCEPTED, UPDATE VALIDATED_AT WITH DATETIME
if (!empty($_GET['idPublication'])) {
    $idPublication = intval(filter_input(INPUT_GET, 'idPublication', FILTER_SANITIZE_NUMBER_INT));
    $validate_at = new DateTime('now');
    $validate_at = $validate_at->format('Y-m-d H:i:s');

    try {
        $publication = new Publication;
        $publication->setId($idPublication);
        $publication->setValidated_at($validate_at);
        $result = $publication->update($validate_at);
        if ($result) {
            header('location: /controllers/dashboard/moderationCtrl.php');
            die;
        } else {
            throw new Exception("Publication non validée", 1);
        }
    } catch (\Throwable $th) {
        $errorMsg = $th->getMessage();
        include_once(__DIR__ . '/../../views/templates/header.php');
        include(__DIR__ . '/../../views/error.php');
        include_once(__DIR__ . '/../../views/templates/footer.php');
        die;
    }
}

//  IF COMMENT ACCEPTED 
if (!empty($_GET['idComment'])) {
    $idComment = intval(filter_input(INPUT_GET, 'idComment', FILTER_SANITIZE_NUMBER_INT));
    $validate_at = new DateTime('now');
    $validate_at = $validate_at->format('Y-m-d H:i:s');

    try {
        $comment = new Comment;
        $comment->setId($idComment);
        $comment->setValidated_at($validate_at);
        $result = $comment->update($validate_at);
        if ($result) {
            header('location: /controllers/dashboard/moderationCtrl.php');
            die;
        } else {
            throw new Exception("$comment non validée", 1);
        }
    } catch (\Throwable $th) {
        $errorMsg = $th->getMessage();
        include_once(__DIR__ . '/../../views/templates/header.php');
        include(__DIR__ . '/../../views/error.php');
        include_once(__DIR__ . '/../../views/templates/footer.php');
        die;
    }
}



include_once(__DIR__ . '/../../views/templates/header.php');
include(__DIR__ . '/../../views/dashboard/moderation.php');
include_once(__DIR__ . '/../../views/templates/footer.php');

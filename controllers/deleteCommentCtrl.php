<?php


session_start();

//  if not connected
if ($_SESSION['loggedIn'] != true) {
    header('location: /controllers/homeCtrl.php');
}

require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../helpers/flash.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // FILTRE ID Publiacation 
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));


    if (empty($error)) {
        try {
            // SUPPRESION
            $result = Comment::delete($id);
            if ($result) {
                flash('deleteComment', 'Votre commentaire a bien été supprimé ! ', FLASH_SUCCESS);
                header('location: /controllers/feedUserCtrl.php');
                die;
            } else {
                throw new Exception("Commentaire non supprimé", 1);
                die;
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/error.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    } else {
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/profilUser.php');
    }
}


include_once(__DIR__ . '/../views/templates/footer.php');

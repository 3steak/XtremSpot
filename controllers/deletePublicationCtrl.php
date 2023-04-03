<?php
session_start();

//  if not connected
if ($_SESSION['loggedIn'] != true) {
    header('location: /controllers/homeCtrl.php');
}

require_once(__DIR__ . '/../models/Publication.php');
require_once(__DIR__ . '/../helpers/flash.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // FILTRE ID Publiacation 
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));


    if (empty($error)) {
        try {
            // SUPPRESION
            $result = Publication::delete($id);
            if ($result) {
                flash('deletePublication', 'Votre publication a bien été supprimé ! ', FLASH_SUCCESS);
                header('location: /controllers/feedUserCtrl.php');
                die;
            } else {
                throw new Exception("Publication non supprimé", 1);
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
        include(__DIR__ . '/../views/dashboard/moderation.php');
    }
}


include_once(__DIR__ . '/../views/templates/footer.php');

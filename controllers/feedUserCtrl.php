<?php
session_start();
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../models/Publication.php');
$jsName = 'feedUserCtrl';

// list cat for filter or 
$listCategory = Category::get();
$listTowns = Publication::getTowns();

try {
    $publications = Publication::get();
    // $comments = Comment::get($idPublication);
} catch (\Throwable $th) {
    //throw $th;
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
    die;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);

    // Faire !empty
    if (!empty($_POST['idCategories'])) {

        $idCategories = trim(filter_input(INPUT_POST, 'idCategories', FILTER_SANITIZE_NUMBER_INT));

        if (empty($idCategories) || $idCategories == '') {
            // Si idCategories n'est pas dans dans la liste
            $error["category"] = "<small class='text-white'>Veuillez selectionner un sport !</small>";
        }
    }
    if (!empty($_POST['town'])) {

        $town = trim(filter_input(INPUT_POST, 'town', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($town) || $town == '') {
            // Si town n'est pas dans dans la liste
            $error["town"] = "<small class='text-white'>Veuillez selectionner une ville !</small>";
        }
    }
    if (!empty($_POST['comment'])) {
        $comment = trim((string) filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($comment)) {
            // $error["comment"] = '<small class="text-white mx-auto">Veuillez renseigner un commentaire</small>';
            flash('commentEmpty', 'Commentaire vide !', FLASH_WARNING);
        }
    }
    // IF NO ERRRROOOR 
    if (empty($error)) {
        var_dump($town);
        die;
    } else {
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/feedUser.php');
    }
} else {
    // IF NO POST ( COMMENT OR FILTER)
    //  faire get all 
    $publications = Publication::get();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/feedUser.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');

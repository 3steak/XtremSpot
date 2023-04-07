<?php
session_start();

//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}
require_once(__DIR__ . '/../../models/Category.php');
require_once(__DIR__ . '/../../helpers/flash.php');

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {

    $result = Category::delete($id);

    if ($result) {
        // renvoyer sur list si execute 
        flash('admin', 'Catégorie supprimée avec succès !', FLASH_SUCCESS);

        header('location: /controllers/dashboard/categoryListCtrl.php');
        die;
    } else {
        header('location: /controllers/dashboard/categoryListCtrl.php');
        die;
    }
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../../views/templates/header.php');
    include(__DIR__ . '/../../views/error.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
    die;
}

include_once(__DIR__ . '/../../views/templates/footer.php');

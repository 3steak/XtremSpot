<?php
session_start();
require_once(__DIR__ . '/../../helpers/flash.php');
require_once(__DIR__ . '/../../config/constants.php');
require_once(__DIR__ . '/../../models/Category.php');

//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
} else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // FILTRE DU SPORT ENREGISTRE
        $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS));

        // isnt empty
        if (empty($categorie)) {
            $error["categorie"] = '<small class= "text-danger">Vous devez entrer une categorie, un sport !!</small>';
        } else {
            $isOk = filter_var($categorie, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            if (!$isOk) {
                $error["categorie"] = '<small class= "text-danger">La categorie n\'est pas au bon format (sans chiffres et caractères spéciaux)!!</small>';
            } else {
                if (strlen($categorie) <= 2 || strlen($categorie) >= 70) {
                    $error["categorie"] = '<small class= "text-danger">La longueur de la categorie n\'est pas bonne</small>';
                }
            }
        }
        if (empty($error)) {
            try {
                $cat = new Category;
                $cat->setName($categorie);
                $result = $cat->addCategory();
                if ($result) {
                    //    FLASH
                    flash('admin', 'Catégorie ajoutée !', FLASH_SUCCESS);
                    header('location: /controllers/dashboard/categoryListCtrl.php');
                    die;
                } else {
                    throw new Exception("Ajout non réussie", 1);
                    die;
                }
            } catch (\Throwable $th) {
                $errorMsg = $th->getMessage();
                include_once(__DIR__ . '/../../views/templates/header.php');
                include(__DIR__ . '/../../views/error.php');
                include_once(__DIR__ . '/../../views/templates/footer.php');
                die;
            }
        } else {
            include_once(__DIR__ . '/../views/templates/headerHome.php');
            include(__DIR__ . '/../views/register.php');
        }
    }
    include_once(__DIR__ . '/../../views/templates/header.php');

    flash('welcome');
    include(__DIR__ . '/../../views/dashboard/CRUD.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
}

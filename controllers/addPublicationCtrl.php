<?php
session_start();
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../models/Publication.php');

$jsName = 'addPublication';

flash('formNewContentOk', 'Votre publication va être lue par nos lutins modo', FLASH_SUCCESS);

// category list 
$listCategory = Category::get();

// AJAX TOWN


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ----------------- CONTROL INPUT FILE-----------------------

    if (isset($_FILES['inputGroupFile'])) {
        $file = $_FILES['inputGroupFile']['name'];
        $filetype = $_FILES['inputGroupFile']['type'];

        if (!empty($file)) {
            if ($_FILES['inputGroupFile']['error'] != 0) {
                $error['file'] = '<small class="text-white">Une erreur est survenue</small>';
            } else {
                // Si l'extension n'est pas dans le format renseigner dans le tableau EXTENSION
                if (!in_array($filetype, EXTENSION)) {
                    $error['type'] = '<small class="text-white">Fichier non valide</small>';
                } else {
                    $extenstion = pathinfo($file, PATHINFO_EXTENSION);
                    $fileName = 'newPicture.' . $extenstion;
                    $from = $_FILES['inputGroupFile']['tmp_name'];
                    $to = '/../public/assets/uploads/newPicture/' . $fileName;
                    move_uploaded_file($from, $to);
                }
            }
        } else {
            $error['file'] = '<small class="text-white">Fichier non renseigné</small>';
        }
    }
    // -------------------- CONTROL SELECT TOWN --------------------------------
    $town = trim(filter_input(INPUT_POST, 'town', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($town) || $town == '') {
        // Si town n'est pas dans dans la liste

        $error["town"] = "<small>Veuillez selectionner une ville</small>";
    }

    // -------------------- CONTROL SELECT CATEGORY --------------------------------
    $idCategories = trim(filter_input(INPUT_POST, 'idCategories', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idCategories) || $idCategories == '') {
        // Si idCategories n'est pas dans dans la liste
        $error["category"] = "<small>Veuillez selectionner un sport !</small>";
    }

    // ------------- CONTROL TEXTAERA--------------------------------
    $legendContent = trim((string) filter_input(INPUT_POST, 'legendContent', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($error)) {
        // Redirige vers son profil avec passage de valeur en URL pour message si publi envoyé
        header('location: /controllers/profilUserCtrl.php?isSent=ok');
        // Envoyer une alerte "Un de nos developpeur contrôle votre publication !"
        die;
    }
};



include_once(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/addPublication.php');
include_once(__DIR__ . '/../views/templates/footer.php');

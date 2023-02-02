<?php
session_start();
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/flash.php');
flash('formNewContentOk', 'Votre publication va être lue par nos lutins modo', FLASH_SUCCESS);

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

<?php
session_start();
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../models/Publication.php');
require_once(__DIR__ . '/../vendor/autoload.php');


if ($_SESSION['loggedIn'] != true) {
    header('location: /controllers/homeCtrl.php');
} else {
    // SET idUser WITH $_SESSION
    $idUser = $_SESSION['user']->id;
}

use GuzzleHttp\Client;

const API_URL = 'https://geo.api.gouv.fr/';
$jsName = 'addPublication';

flash('formNewContentOk', 'Votre publication va être lue par nos plus beaux modérateurs', FLASH_SUCCESS);

// category list 
$listCategory = Category::get();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ID DANS SESSION
    // ----------------- CONTROL ID USER -----------------------


    if (empty($idUsers) || $idUsers == '') {
        $error['idUsers'] = '<small class="text-black"> Vous devez être connecté pour publier du contenu.</small>';
    }


    // ----------------- CONTROL INPUT FILE-----------------------

    if (isset($_FILES['inputGroupFile'])) {


        $inputGroupFile = $_FILES['inputGroupFile'];
        if (!empty($inputGroupFile['name'])) {
            if ($inputGroupFile['error'] > 0) {
                $error['file'] = '<small class="text-white">Une erreur est survenue</small>';
            }
            if (!in_array($inputGroupFile['type'], AUTHORIZED_IMAGE_FORMAT)) {
                $error['type'] = '<small class="text-white">Fichier non valide</small>';
            }
            $maxSize = 15728640; //15mb
            if ($_FILES['inputGroupFile']['size'] > $maxSize) {
                $error['type'] = '<small class="text-white">Fichier trop volumineux</small>';
            }
        }
    } else {
        $error['file'] = '<small class="text-white">Fichier non renseigné</small>';
    }



    // -------------------- CONTROL SELECT ZIPCODE && TOWN WITH COMPOSER Guzzle --------------------------------


    $town = trim(filter_input(INPUT_POST, 'town', FILTER_SANITIZE_SPECIAL_CHARS));
    $zipcode = trim(filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT));

    if (empty($town) || $town == '') {
        // Si town n'est pas dans dans la liste
        $error["town"] = "<small class='text-white'>Veuillez selectionner une ville</small>";
    }
    if (empty($zipcode) || $zipcode == '') {
        // Si town n'est pas dans dans la liste
        $error["zipcode"] = "<small class='text-white'>Veuillez rentrer un code postal</small>";
    }

    // control avec librairie Guzzle
    // j'envoie la requete vers url de l'api 
    $client = new GuzzleHttp\Client(['base_uri' => API_URL]);

    // Je recupère les données renvoyés par l'API et le json_decode et obtient un Array
    $response = $client->request('GET', 'communes?nom=' . $town . '&fields=nom&format=json');

    $response = json_decode($response->getBody()->getContents());

    $towns = [];

    // j'envoi chaque réponse de l'api au format string dans le tableau towns
    foreach ($response as $resp) {
        array_push($towns, $resp->nom);
    }

    // je contrôle dans le tableau town contenant les résultats de l'api si la ville envoyé dans le post s'y trouve
    if (!in_array($town, $towns)) {
        $error["town"] = "<small class='text-white'>Veuillez rentrer un nom de ville existant</small>";
    }



    // -------------------- CONTROL SELECT CATEGORY --------------------------------
    $idCategories = trim(filter_input(INPUT_POST, 'idCategories', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idCategories) || $idCategories == '') {
        // Si idCategories n'est pas dans dans la liste
        $error["category"] = "<small class='text-white'>Veuillez selectionner un sport !</small>";
    }
    // ------------- CONTROL TITLE--------------------------------
    $title = trim((string) filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($title) || $title == '') {
        // Si title n'est pas dans dans la liste
        $error["title"] = "<small class='text-white'>Veuillez rentrer un titre</small>";
    }
    // ------------- CONTROL TEXTAERA--------------------------------
    $description = trim((string) filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));

    //  --------------- CONTROL MARKERS ------------------------------------------------------
    // je recup latlng dans input hidden

    $coordinates = trim((string) filter_input(INPUT_POST, 'latlng', FILTER_SANITIZE_SPECIAL_CHARS));

    if (empty($coordinates) || $coordinates == '') {
        $error['coordinates'] = "<small class='text-white'>Veuillez mettre votre marker !</small>";
    }
    preg_match(REGEXP_LATLNG, $coordinates, $markers);
    $marker_latitude = $markers[1];
    $marker_longitude = $markers[2];

    if (empty($error)) {
        try {
            $extension = pathinfo($inputGroupFile['name'], PATHINFO_EXTENSION);
            $from = $inputGroupFile['tmp_name'];
            $image_name = uniqid('img_') . '.' . $idUsers . '.' . $extension;
            $to = __DIR__ . '/../public/assets/uploads/newPicture/' . $image_name;
            $move = move_uploaded_file($from, $to);
            if (!$move) {
                throw new Exception("Image non envoyé", 1);
                die;
            }
            $publication = new Publication;
            $publication->setTitle($title);
            $publication->setDescription($description);
            $publication->setImage_name($image_name);
            $publication->setMarker_longitude($marker_longitude);
            $publication->setMarker_latitude($marker_latitude);
            $publication->setTown($town);
            $publication->setIdCategories($idCategories);
            $publication->setIdUsers($idUsers);

            $result = $publication->addPublication();
            if ($result) {
                header('location: /controllers/profilUserCtrl.php?isSent=ok');
                die;
            } else {
                throw new Exception("Publication non ajouté", 1);
                die;
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
        // Redirige vers son profil avec passage de valeur en URL pour message si publication envoyé


    } else {
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/addPublication.php');
    }
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/addPublication.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');

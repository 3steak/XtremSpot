<?php
session_start();
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../models/Publication.php');
require_once(__DIR__ . '/../vendor/autoload.php');


use GuzzleHttp\Client;

const API_URL = 'https://geo.api.gouv.fr/';
$jsName = 'addPublication';

flash('formNewContentOk', 'Votre publication va être lue par nos lutins modo', FLASH_SUCCESS);

// category list 
$listCategory = Category::get();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    var_dump($_POST);
    die;
    // ----------------- CONTROL INPUT FILE-----------------------

    if (isset($_FILES['inputGroupFile'])) {
        $inputGroupFile = $_FILES['inputGroupFile'];
        if (!empty($inputGroupFile['name'])) {
            if ($inputGroupFile['error'] > 0) {
                $error['file'] = '<small class="text-white">Une erreur est survenue</small>';
            } else {
                if (!in_array($inputGroupFile['type'], AUTHORIZED_IMAGE_FORMAT)) {
                    $error['type'] = '<small class="text-white">Fichier non valide</small>';
                } else {
                    $extension = pathinfo($inputGroupFile['name'], PATHINFO_EXTENSION);
                    $from = $inputGroupFile['name'];
                    $fileName = uniqid('img_') . '.' . $extension;
                    $to = __DIR__ . '/../public/uploads/newPicture' . $fileName;
                    move_uploaded_file($from, $to);
                }
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
        $error["town"] = "<small>Veuillez selectionner une ville</small>";
    }
    if (empty($zipcode) || $zipcode == '') {
        // Si town n'est pas dans dans la liste
        $error["zipcode"] = "<small>Veuillez rentrer un code postal</small>";
    }

    // control avec librairie Guzzle
    // j'envoie la requete vers url de l'api 
    $client = new GuzzleHttp\Client(['base_uri' => API_URL]);

    // Je recupère les données renvoyés par l'API et le json decode et obtient un Array
    $response = $client->request('GET', 'communes?codePostal=' . $zipcode . '&fields=nom&format=json');
    $response = json_decode($response->getBody()->getContents());
    $towns = [];

    foreach ($response as $resp) {
        array_push($towns, $resp->nom);
    }
    if (!in_array($town, $towns)) {
        $error["town"] = "<small>Veuillez rentrer un nom de ville existant</small>";
    }



    // -------------------- CONTROL SELECT CATEGORY --------------------------------
    $idCategories = trim(filter_input(INPUT_POST, 'idCategories', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idCategories) || $idCategories == '') {
        // Si idCategories n'est pas dans dans la liste
        $error["category"] = "<small>Veuillez selectionner un sport !</small>";
    }
    // ------------- CONTROL TITLE--------------------------------
    $title = trim((string) filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($title) || $title == '') {
        // Si title n'est pas dans dans la liste
        $error["title"] = "<small>Veuillez rentrer un titre</small>";
    }
    // ------------- CONTROL TEXTAERA--------------------------------
    $description = trim((string) filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));

    //  --------------- CONTROL MARKER ------------------------------------------------------
    // je recup latlng dans input hidden



    if (empty($error)) {
        // try {
        //     //code...
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
        // Redirige vers son profil avec passage de valeur en URL pour message si publi envoyé
        header('location: /controllers/profilUserCtrl.php?isSent=ok');
        // Envoyer une alerte "Un de nos developpeur contrôle votre publication !"
        die;
    } else {
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/addPublication.php');
    }
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/addPublication.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');

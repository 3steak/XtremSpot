<?php
require_once(__DIR__ . '/../config/constants.php');
$jsName = 'infoProfilCtrl';
$sports = ['Skate', 'Roller', 'Bmx', 'Surf', 'Kitesurf', 'Paddle', 'Longboard', 'Bodyboard', 'Planche à voile'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // ========== FILE AVATAR ======================

    // if (isset($_FILES['avatar'])) {
    //     // son nom
    //     $file = $_FILES['avatar']['name'];
    //     // son type
    //     $filetype = $_FILES['avatar']['type'];

    //     if (!empty($file)) {
    //         if ($_FILES['avatar']['error'] != 0) {
    //             $error['file'] = '<small class="text-white">Une erreur est survenue</small>';
    //         } else {
    //             // Si l'extension n'est pas dans le format renseigner dans le tableau EXTENSION
    //             if (!in_array($filetype, EXTENSION)) {
    //                 $error['type'] = '<small class="text-white">Fichier non valide</small>';
    //             } else {
    //                 $extenstion = pathinfo($file, PATHINFO_EXTENSION);
    //                 // AJOUTER $USERID pour nom
    //                 $fileName = 'avatarUser.' . $extenstion;
    //                 $from = $_FILES['avatar']['tmp_name'];
    //                 $to = __DIR__ . '/../public/assets/uploads/profilPicture/' . $fileName;
    //                 move_uploaded_file($from, $to);
    //             }
    //         }
    //     } else {
    //         $error['file'] = '<small class="text-white">Fichier non renseigné</small>';
    //     }
    // }
    // ============= FIRSTNAME : clean and check ===========
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    // Isnt empty
    if (empty($firstname)) {
        $error["firstname"] = '<small class="text-white">Vous devez entrer un prénom !!</small>';
    } else { // required input, return error
        $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // tchek regex CONST
        if (!$isOk) {
            $error["firstname"] = '<small class="text-white">Le prénom n\'est pas au bon format!!</small>';
        } else {
            if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                $error["firstname"] = '<small class="text-white">La longueur du prénom n\'est pas bonne</small>';
            }
        }
    }
    // ===================== Lastname : Clean and check =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // isnt empty
    if (empty($lastname)) {
        $error["lastname"] = '<small class= "text-white">Vous devez entrer un nom!!</small>';
    } else { // for required, return error
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if (!$isOk) {
            $error["lastname"] = '<small class= "text-white">Le nom n\'est pas au bon format!!</small>';
        } else {
            if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                $error["lastname"] = '<small class= "text-white">La longueur du nom n\'est pas bon</small>';
            }
        }
    }

    // ===================== Pseudo : Clean and check =======================

    // !!!!!!!!!!! CONTROL  SI LE PSEUDO N'EST PAS DEJA EXISTANT !!!!!!! 
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
    // isnt empty
    if (empty($pseudo)) {
        $error["pseudo"] = '<small class= "text-white">Vous devez entrer un pseudo!!</small>';
    } else { // for required, return error
        $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if (!$isOk) {
            $error["pseudo"] = '<small class= "text-white">Le pseudo n\'est pas au bon format!!</small>';
        } else {
            if (strlen($pseudo) <= 2 || strlen($pseudo) >= 70) {
                $error["pseudo"] = '<small class= "text-white">La longueur du pseudo n\'est pas bon</small>';
            }
        }
    }

    // =========== Password ========== 
    $password = filter_input(INPUT_POST, 'password');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

    if (empty($password) || empty($confirmPassword)) {
        $error['password'] = '<small class="text-white">Veuillez renseigner un mot de passe</small>';
    } else {
        if ($password != $confirmPassword) {
            $error['confirmPassword'] = '<small class="text-white">Veuillez entrer le même mot de passe</small>';
        } else {
            // VERIF PAR REGEX
        }
        // Encodage du MDP
        $paswordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    // ----------------- SPORT ----------------------- 
    $sport = trim(filter_input(INPUT_POST, 'sport', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($sport)) {
        if (!in_array($sport, $sports)) {
            $error["sport"] = "<small>Le sport entré n'est pas valide!</small>";
        }
    }
    //  ========== BIRTHDAY =========

    $birthday = trim(filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT));

    if (empty($birthday)) {
        $error['birthday'] = '<small class="text-white">Veuillez rentrer une date de naissance.</small>';
    } else {
        $isOk = filter_var($birthday, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_BIRTHDAY . '/')));
        if (!$isOk) {
            $error['birthday'] = '<small class="text-white">La date de naissance n\'est pas au bon format.</small>';
        } else {
            $year = date('Y', strtotime($birthday));
            if (date("Y") - $year < 18 || date('Y') - $year > 120) {
                $error['birthday'] = '<small class="text-white">La date de naissance n\'est pas valide</small>';
            }
        }
    }

    if (empty($error)) {
        // Redirige vers settings 
        header('location: /controllers/settingsCtrl.php');
        die;
    }
    // FIN DU IF 
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/infoProfil.php');
include_once(__DIR__ . '/../views/templates/footer.php');

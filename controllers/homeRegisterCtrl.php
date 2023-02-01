<?php

require_once(__DIR__ . '/../config/constants.php');


$jsName = 'homeRegisterCtrl';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    //============================= EMAIL ================
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error["email"] = '<small class="text-white">L\'email n\'est pas renseigné</small>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = '<small class= "text-white">L\'email ne correspond pas au format requis pour un email</small>';
    }
    // =========== Password ========== 
    $password = filter_input(INPUT_POST, 'password');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

    if (empty($password) || empty($confirmPassword)) {
        $error['password'] = '<small class="text-white">Veuillez renseigner un mot de passe</small>';
    } else {
        if ($password != $confirmPassword) {
            $error['password'] = '<small class="text-white">Veuillez entrer le même mot de passe</small>';
        } else {
            // VERIF PAR REGEX
        }
        // Encodage du MDP
        $paswordHash = password_hash($password, PASSWORD_DEFAULT);
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
        // Redirige vers page de connexion ( il devra valider un mail)
        header('location: /controllers/homeConnexionCtrl.php');
        die;
    }

    // FIN DU IF 
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/homeRegister.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');

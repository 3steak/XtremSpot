<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
flash('register', 'Ton compte vient d\'être crée ! Merci de le valider en cliquant sur le mail envoyé !', FLASH_SUCCESS);
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Category.php');

$jsName = 'registerCtrl';
$listCategory = Category::get();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ============= FIRSTNAME : clean and check ===========
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    // Isnt empty
    if (empty($firstname)) {
        $error["firstname"] = '<small class="text-danger">Vous devez entrer un prénom !!</small>';
    } else { // required input, return error
        $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // tchek regex CONST
        if (!$isOk) {
            $error["firstname"] = '<small class="text-danger">Le prénom n\'est pas au bon format!!</small>';
        } else {
            if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                $error["firstname"] = '<small class="text-danger">La longueur du prénom n\'est pas bonne</small>';
            }
        }
    }
    // ===================== Lastname : Clean and check =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // isnt empty
    if (empty($lastname)) {
        $error["lastname"] = '<small class= "text-danger">Vous devez entrer un nom!!</small>';
    } else { // for required, return error
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if (!$isOk) {
            $error["lastname"] = '<small class= "text-danger">Le nom n\'est pas au bon format!!</small>';
        } else {
            if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                $error["lastname"] = '<small class= "text-danger">La longueur du nom n\'est pas bon</small>';
            }
        }
    }

    // ===================== Pseudo : Clean and check =======================
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
    // isnt empty
    if (empty($pseudo)) {
        $error["pseudo"] = '<small class= "text-danger">Vous devez entrer un pseudo!!</small>';
    } else { // for required, return error
        $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if (!$isOk) {
            $error["pseudo"] = '<small class= "text-danger">Le pseudo n\'est pas au bon format!!</small>';
        } else {
            if (strlen($pseudo) <= 2 || strlen($pseudo) >= 70) {
                $error["pseudo"] = '<small class= "text-danger">La longueur du pseudo n\'est pas bon</small>';
            }
        }
    }
    //============================= EMAIL ================
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error["email"] = '<small class="text-danger">L\'email n\'est pas renseigné</small>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = '<small class= "text-danger">L\'email ne correspond pas au format requis pour un email</small>';
    }
    // =========== Password ========== 
    $password = filter_input(INPUT_POST, 'password');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

    if (empty($password) || empty($confirmPassword)) {
        $error['password'] = '<small class="text-danger">Veuillez renseigner un mot de passe</small>';
    } else {
        if ($password != $confirmPassword) {
            $error['confirmPassword'] = '<small class="text-danger">Veuillez entrer le même mot de passe</small>';
        } else {
            // VERIF PAR REGEX
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_PASSWORD . '/')));
            if (!$isOk) {
                $error["password"] = '<small class= "text-danger">Le mot de passe ne respecte pas les critères !!</small>';
            }
        }
        // Encodage du MDP
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    // -------------------- CONTROL SELECT CATEGORY --------------------------------
    $idCategories = trim(filter_input(INPUT_POST, 'idCategories', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idCategories) || $idCategories == '') {
        // Si idCategories n'est pas dans dans la liste
        $error["category"] = "<small class='text-danger'>Veuillez selectionner un sport !</small>";
    }

    //  ISMAILEXIST = USER PAS ENCORE INSCRIT
    if (User::isMailExist($email)) {
        $error["email"] = '<small class= "text-danger">Ce mail correspond déjà à un autre utilisateur</small>';
    }
    if (empty($error)) {
        try {
            $user = new User;
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setPseudo($pseudo);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setIdCategories($idCategories);

            $result = $user->addUser();
            if ($result) {
                // MAIL DE VERIF
                $to = $user->getEmail();
                $subject = 'Email de validation';
                $link = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/controllers/validateMailCtrl.php?email=' . $user->getEmail();
                $mailBody = 'Bonjour<br>Merci de valider votre compte en cliquant sur ce lien <a href="' . $link . '">lien</a>!';
                mail($to, $subject, $mailBody);
                header('location: /controllers/homeCtrl.php?register=ok');
                die;
            } else {
                throw new Exception("Inscription non réussie", 1);
                die;
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    } else {
        include_once(__DIR__ . '/../views/templates/headerHome.php');
        include(__DIR__ . '/../views/register.php');
    }

    // FIN DU IF 
} else {
    include_once(__DIR__ . '/../views/templates/headerHome.php');
    include(__DIR__ . '/../views/register.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');

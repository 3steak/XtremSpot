<?php

session_start();
$jsName = 'profilCrudCtrl';

require_once(__DIR__ . '/../../helpers/flash.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/../../models/Publication.php');
require_once(__DIR__ . '/../../models/Comment.php');
require_once(__DIR__ . '/../../models/Category.php');

$idUser = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
try {
    if (User::isIdExist($idUser) === false) {
        throw new Exception("Cet utilisateur n'existe pas", 1);
    }
    $profilUser = User::get($idUser);
    $publications = Publication::getUserPublication($idUser);
    $listCategory = Category::get();

    $comments = Comment::getUserComments($idUser);
    // var_dump($comments);
    // die;
    //  Si profilUser return false
    if (!$profilUser) {
        throw new Exception('Id non valide', 1);
    }
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../../views/templates/header.php');
    include(__DIR__ . '/../../views/error.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
    die;
}

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

    // -------------------- CONTROL SELECT CATEGORY --------------------------------
    $idCategories = trim(filter_input(INPUT_POST, 'idCategories', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idCategories) || $idCategories == '') {
        // Si idCategories n'est pas dans dans la liste
        $error["category"] = "<small class='text-white'>Veuillez selectionner un sport !</small>";
    }
    // -------------------- CONTROL SELECT ADMIN OR NOT --------------------------------
    $admin = trim(filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_NUMBER_INT));
    if (empty($admin) || $admin == '') {
        // Si idCategories n'est pas dans dans la liste
        $error["category"] = "<small class='text-white'>Veuillez selectionner un sport !</small>";
    }
    //  ISMAILEXIST = USER PAS ENCORE INSCRIT
    if (User::isMailExist($email)) {
        $error["email"] = '<small class= "text-white">Ce mail correspond déjà à un autre utilisateur</small>';
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
            $user->setAdmin($admin);

            $result = $user->update($admin);
            if ($result) {
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
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/register.php');
    }

    // FIN DU IF 
} else {
    require_once(__DIR__ . '/../../views/templates/header.php');
    require(__DIR__ . '/../../views/dashboard/profilCrud.php');
}

require_once(__DIR__ . '/../../views/templates/footer.php');

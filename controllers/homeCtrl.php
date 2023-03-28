<?php
session_start();
require_once(__DIR__ . '/../helpers/flash.php');
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../models/User.php');

if (!empty($_GET) && $_GET['register'] == 'ok') {
    flash('register');
}
if (!empty($_GET) && $_GET['register'] == 'validated') {
    flash('register');
}
if (!empty($_GET) && $_GET['register'] == 'NoValidated') {
    flash('register');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //  TEST MAIL = SI MAIL EXISTE PAS, COMPTE INEXISTANT
    //============================= EMAIL ================
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error["email"] = '<small class="text-white">L\'email n\'est pas renseigné</small>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = '<small class= "text-white">L\'email ne correspond pas au format requis pour un email</small>';
    }
    if (!User::isMailExist($email)) {
        $error["email"] = '<small class="text-white">Utilisateur introuvé</small>';
    }
    // =========== Password ========== 
    $password = filter_input(INPUT_POST, 'password');

    if (empty($password)) {
        $error['password'] = '<small class="text-white">Veuillez renseigner un mot de passe</small>';
    }

    if (empty($error)) {
        $user = User::getByMail($email);

        $hash = $user->password;
        // test du MDP
        $isPasswordOk = password_verify($password,  $hash);

        if (!$isPasswordOk) {
            $error['password'] = '<small class="text-white">Mot de passe incorrect</small>';
        } else {
            unset($user->password);
            if (is_null($user->validated_at)) {
                $error['noValidated'] = '<div class="alert alert-warning" role="alert">
                Veuillez valider votre compte grâce à l\'email de validation envoyé !
              </div>';
            }
            $_SESSION['user'] = $user;
            $_SESSION['loggedIn'] = true;
            if ($_SESSION['user']->admin === 1) {
                $_SESSION['admin'] = true;
            }
            // création function random message
            $random  = function ($messages) {
                return $messages[array_rand($messages)];
            };

            $messages = [' ça va ?', ' la forme ?', 'aller fait voir ton spot !'];
            flash('register', 'Bienvenue ' . $_SESSION['user']->pseudo . ' ' . $random($messages), FLASH_SUCCESS);
            flash('welcome', 'Bienvenue ' . $_SESSION['user']->pseudo . ' dans l\'espace admin, ici tu peux modérer les publications, commentaires et les signalements, gérer les utilisateurs et ajouter des catégories "sport" ! ', FLASH_INFO);

            header('location: /controllers/feedUserCtrl.php?register=bienvenue');
            die;
        }
    }
}

//  PHP MAILER pour VERIF MAIL
$jsName = 'homeCtrl';
include_once(__DIR__ . '/../views/templates/headerHome.php');
include(__DIR__ . '/../views/home.php');
include_once(__DIR__ . '/../views/templates/footer.php');

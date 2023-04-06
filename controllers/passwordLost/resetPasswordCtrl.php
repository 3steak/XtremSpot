<?php
session_start();
$jsName = 'updatePass';
require_once(__DIR__ . '/../../config/constants.php');
require_once(__DIR__ . '/../../helpers/flash.php');
require_once(__DIR__ . '/../../models/User.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //============================= EMAIL ================
    $email = trim($_SESSION['mail']);

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
        $password = password_hash($password, PASSWORD_DEFAULT);
    }


    if (empty($error)) {
        try {
            $userId = User::getByMail($email);
            $user = new User;
            $user->setId($userId->id);
            $user->setPassword($password);

            $result = $user->newPass();

            if ($result) {
                // MAIL DE VERIF
                flash('newPass', 'Ton mot de passe a bien été modifié !', FLASH_SUCCESS);
                unset($_SESSION['code']);
                unset($_SESSION['mail']);
                header('location: /controllers/homeCtrl.php');
                die;
            } else {
                throw new Exception("Changement de mot de pass non réussie", 1);
                die;
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../../views/templates/header.php');
            include(__DIR__ . '/../../../views/errors.php');
            include_once(__DIR__ . '/../../views/templates/footer.php');
            die;
        }
    } else {
        include_once(__DIR__ . '/../../views/templates/headerHome.php');
        include(__DIR__ . '/../../views/resetPassword.php');
    }

    // FIN DU IF 
} else {
    include_once(__DIR__ . '/../../views/templates/headerHome.php');
    include_once(__DIR__ . '/../../views/passwordLost/resetPassword.php');
}

include_once(__DIR__ . '/../../views/templates/footer.php');

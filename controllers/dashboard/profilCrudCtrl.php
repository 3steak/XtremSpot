<?php

session_start();
//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}
$jsName = 'profilCrudCtrl';
require_once(__DIR__ . '/../../helpers/flash.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/../../models/Publication.php');
require_once(__DIR__ . '/../../models/Comment.php');
require_once(__DIR__ . '/../../models/Category.php');
flash('update', 'Utilisateur modifié avec succès ! ', FLASH_SUCCESS);
flash('noUpdate', 'Utilisateur non modifié ! ', FLASH_WARNING);

$idUser = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    if (User::isIdExist($idUser) === false) {
        throw new Exception("Cet utilisateur n'existe pas", 1);
    }
    $profilUser = User::get($idUser);
    $publications = Publication::getUserPublication($idUser);
    $listCategory = Category::get();
    $comments = Comment::getUserComments($idUser);

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

    // -------------------- CONTROL SELECT ADMIN OR NOT --------------------------------
    $admin = intval(filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_NUMBER_INT));
    if (empty($admin) && $admin != 0) {
        // Si idCategories n'est pas dans dans la liste
        $error["admin"] = "<small class='text-white'>Veuillez selectionner si ADMIN OU NON !</small>";
    }

    if (empty($error)) {

        try {
            $user = new User;
            $user->setId($idUser);

            $user->setAdmin($admin);

            $result = $user->update($admin);
            if ($result) {
                // Faire row count si >1 mis a jour sinon non modifié
                header('location: /controllers/dashboard/profilCrudCtrl.php?id=' . $idUser . '?update');
                die;
            } else {
                header('location: /controllers/dashboard/profilCrudCtrl.php?id=' . $idUser . '?noUpdate');
                die;
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../../views/templates/header.php');
            include(__DIR__ . '/../../views/error.php');
            include_once(__DIR__ . '/../../views/templates/footer.php');
            die;
        }
    } else {
        include_once(__DIR__ . '/../../views/templates/header.php');
        include(__DIR__ . '/../../views/dashboard/profilCrud.php');
    }

    // FIN DU IF 
} else {
    include_once(__DIR__ . '/../../views/templates/header.php');

    if (!empty($_GET) && $_GET['id'] == $idUser . '?update') {
        flash('update');
    }
    if (!empty($_GET) && $_GET['id'] == $idUser . '?noUpdate') {
        flash('noUpdate');
    }
    include(__DIR__ . '/../../views/dashboard/profilCrud.php');
}

include_once(__DIR__ . '/../../views/templates/footer.php');

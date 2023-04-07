<?php
session_start();

//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/../../models/Publication.php');

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    if (User::isIdExist($id) === false) {
        throw new Exception("Cet utilisateur n'existe pas", 1);
    }
    $userPublications = Publication::getUserPublication($id);
    $result = User::delete($id);

    if ($result) {

        foreach ($userPublications as $userPublication) {
            $filepath = __DIR__ . '/../../public/assets/uploads/newPicture/' . $userPublication->image_name;
            unlink($filepath);
        }
        // renvoyer sur list si execute 
        header('location: /controllers/dashboard/usersListCtrl.php');
        die;
    } else {
        header('location: /controllers/dashboard/usersListCtrl.php');
        die;
    }
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../../views/templates/header.php');
    include(__DIR__ . '/../../views/error.php');
    include_once(__DIR__ . '/../../views/templates/footer.php');
    die;
}

include_once(__DIR__ . '/../../views/templates/footer.php');

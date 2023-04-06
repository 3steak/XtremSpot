<?php
session_start();
$jsName = 'validateCode';


// Vérification du code de validation



$data = json_decode(file_get_contents('php://input'));
if (isset($data)) {
    if ($data->code == $_SESSION['code']) {

        // Envoi de la réponse en tant que JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        // Envoi de la réponse en tant que JSON
        $error['code'] = "Le code envoyé n'est pas bon !";
        include_once(__DIR__ . '/../../views/templates/headerHome.php');
        include(__DIR__ . '/../../views/passwordLost/validateCode.php');
    }
}

include_once(__DIR__ . '/../../views/templates/headerHome.php');
include(__DIR__ . '/../../views/passwordLost/validateCode.php');
include_once(__DIR__ . '/../../views/templates/footer.php');

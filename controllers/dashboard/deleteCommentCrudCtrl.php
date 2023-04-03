<?php
session_start();

//  if not connected
if ($_SESSION['loggedIn'] != true && $_SESSION['admin'] != true) {
    header('location: /../controllers/homeCtrl.php');
}

require_once(__DIR__ . '/../../models/Comment.php');
require_once(__DIR__ . '/../../config/constants.php');
require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__ . '/../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once(__DIR__ . '/../../vendor/phpmailer/phpmailer/src/Exception.php');
require_once(__DIR__ . '/../../vendor/phpmailer/phpmailer/src/SMTP.php');




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // FILTRE ID COMMENT 
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    //============================= EMAIL ================
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error["email"] = '<small class="text-white">L\'email n\'est pas renseigné</small>';
    }

    $refuseMsg = trim(filter_input(INPUT_POST, 'refuseMsg', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!in_array($refuseMsg, REFUSE_MESSAGES)) {
        $error['refuseMsg'] = '<small class="text-white">Fichier non valide</small>';
    }


    if (empty($error)) {
        try {
            // SUPPRESION

            $result = Comment::delete($id);
            if ($result) {

                // IF OK ENVOI MAIL
                $mail = new PHPMailer(true);
                $mail->setLanguage('fr', '/../../vendor/phpmailer/phpmailer/language/');


                try {
                    //Server settings
                    $mail->isSMTP();
                    //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port = 465;
                    $mail->Username = 'cyprien.bocquet@gmail.com';
                    $mail->Password = 'tuyfehkfrlnfwgmv';
                    //Recipients
                    $mail->setFrom('xtremspot@site.fr');

                    // Remplace $mail par mon mail
                    $mail->addAddress('cyprien.bocquet@gmail.com');               //Name is optional

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Motif de refus';
                    $mail->Body    = 'Votre commentaire a été supprimé pour ce motif, ' . $refuseMsg . ', veuillez respecter les règles d\'utilisation du site !<br> Belle journée ! ';

                    $mail->send();
                    header('location: /controllers/dashboard/moderationCtrl.php');
                    die;
                } catch (\Throwable $th) {
                    throw new Exception($mail->ErrorInfo, 1);
                }
            } else {
                throw new Exception("Commentaire non supprimé", 1);
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
        include(__DIR__ . '/../../views/dashboard/moderation.php');
    }
}


include_once(__DIR__ . '/../../views/templates/footer.php');

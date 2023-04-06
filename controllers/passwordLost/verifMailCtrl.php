<?php
session_start();
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__ . '/../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once(__DIR__ . '/../../vendor/phpmailer/phpmailer/src/Exception.php');
require_once(__DIR__ . '/../../vendor/phpmailer/phpmailer/src/SMTP.php');

$jsName = 'reset-password';

// Vérifier si la méthode de la requête est bien POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'));

    // Vérifier si l'e-mail existe

    $email = trim($data->email);
    if (empty($email)) {
        $error['email'] = "Veuillez rentrer un mail !";
    }
    if (empty($error)) {
        try {
            $result = User::isMailExist($email);
            if ($result) {
                $code = rand(100000, 999999);

                $_SESSION['code'] = $code;
                $_SESSION['mail'] = $email;

                // Envoyer le code de validation par e-mail à l'utilisateur

                $mail = new PHPMailer(true);
                $mail->setLanguage('fr', '/../../vendor/phpmailer/phpmailer/language/');

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
                $mail->Subject = 'Code validation reset mot de passe';
                $mail->Body    = 'Voici votre code pour changer votre mot de passe, ' . $code . '<br> Belle journée ! ';

                $mail->send();

                // Retourner une réponse JSON indiquant que le code a été envoyé avec succès
                header('Content-Type: application/json');
                echo json_encode(['success' => true]);
            } else {
                $error['mail'] = 'Ce compte n\'existe pas, veuillez en créer un :<br>
                 <a href="/../../controller/registerCtrl.php"></a>';
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../../views/templates/headerHome.php');
            include(__DIR__ . '/../../../views/errors.php');
            include_once(__DIR__ . '/../../views/templates/footer.php');
            die;
        }
    } else {
        include_once(__DIR__ . '/../../views/templates/headerHome.php');
        include(__DIR__ . '/../../views/passwordLost/verifMail.php');
    }
} else {
    include_once(__DIR__ . '/../../views/templates/headerHome.php');
    include(__DIR__ . '/../../views/passwordLost/verifMail.php');
}

include_once(__DIR__ . '/../../views/templates/footer.php');

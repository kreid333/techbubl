<?php
// import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// load Composer's autoloader
require '../vendor/autoload.php';

// loading dontenv to access .env variable
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

// functions
function view($area, $name, $data = null)
{
    require("../app/views/layout.view.php");
}

function redirect($url)
{
    header("Location:$url");
    die();
}
function sendEmail($recipient_email, $recipient_name, $subject, $body)
{

    // create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kairetech@gmail.com';
        $mail->Password = $_ENV["PASSWORD"];
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // recipients
        $mail->setFrom('kairetech@gmail.com', 'TechBubl');
        $mail->addAddress($recipient_email, $recipient_name);

        // content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

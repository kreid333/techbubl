<?php
// import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// load Composer's autoloader
require '../vendor/autoload.php';

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
function sendEmail($recipient, $name, $verification_code)
{

    // create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kairetech@gmail.com';
        $mail->Password = 'bboyojogvnhibhqk';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // recipients
        $mail->setFrom('kairetech@gmail.com', 'TechBubl');
        $mail->addAddress($recipient, $name);

        // content
        $mail->isHTML(true);
        $mail->Subject = 'Verify your account';
        $mail->Body    = '<span style="display: block;">Please click the link below to verify your account.</span>
        <a href="localhost/admin/verifyaccount?vc=' . $verification_code . '" style="display: block; margin-top: 10px;">Click here</a>';

        $mail->send();
        return "A verification email has been sent to " . $recipient;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

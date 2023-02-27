<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");

$data = [];

// if the request method is POST and the POST variable "newsletter-email" is not set...
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
    $name = trim($_POST["first-name"]) . " " . trim($_POST["last-name"]);

    // validating the format of the given email
    $formattedEmail = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);

    $message = trim($_POST["message"]);

    $body = '
    <span style="display: block; margin: 10px 0;">Name: ' . $name . '</span>
    <span style="display: block; margin: 10px 0;">Email Address: ' . $formattedEmail . '</span>
    <span style="display: block; margin: 10px 0;">Message: ' . $message . '</span>
    ';

    // if all fields are not empty and the email is formatted properly...
    if (!empty($name) && !empty($message) && $formattedEmail) {
        sendEmail("kairetech@gmail.com", $name, "Contact Form Sumission", $body);
        $data["success"] = "Your submission has been sent.";
    } else {
        $data["err"] = "Please ensure that all fields are filled out correctly and try again.";
    }
}

view("main/contact", $data);

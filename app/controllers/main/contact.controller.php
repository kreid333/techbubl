<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");

$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["first-name"] . " " . $_POST["last-name"];
    $email = $_POST["email-address"];

    $is_emailFormatted = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);

    $message = $_POST["message"];

    $body = '
    <span style="display: block; margin: 10px 0;">Name: ' . $name . '</span>
    <span style="display: block; margin: 10px 0;">Email Address: ' . $email . '</span>
    <span style="display: block; margin: 10px 0;">Message: ' . $message . '</span>
    ';

    if (!empty($name) && !empty($email) && !empty($message) && $is_emailFormatted) {
        sendEmail("kairetech@gmail.com", $name, "Contact Form Sumission", $body);
        $data["success"] = "Your submission has been sent.";
    } else {
        $data["err"] = "Please ensure that all fields are filled out correctly and try again.";
    }
}

view("main/contact", $data);

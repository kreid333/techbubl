<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Users.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (isset($_SESSION["id"])) {
    redirect("/admin");
} else {
    // if the request method is POST and the POST variable "newsletter-email" is not set...
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
        // validating the format of the given email
        $formattedEmail = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];


        // if the password field is empty or the given email is not formatted properly...
        if (empty($password) || !$formattedEmail) {
            $data["err"] = "Please fill in all fields correctly.";
        }

        // if both fields were filled in correctly...
        if (!isset($data["err"])) {
            $user = Users::getUser($formattedEmail);

            // if the user provided email gave us a user...
            if ($user) {

                // if the user provided password matches the one in the database...
                if (password_verify($password, $user["password"])) {
                    $_SESSION["id"] = $user["id"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["role"] = $user["role"];
                    redirect("/admin");
                } else {
                    $data["err"] = "Wrong credentials. Please try again.";
                }
            } else {
                $data["err"] = "Wrong credentials. Please try again.";
            }
        }
    }
}

view("admin/login", $data);

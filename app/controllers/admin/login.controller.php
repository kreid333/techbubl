<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
session_start();

$data = [];

// if the user is already logged in...
if (isset($_SESSION["id"])) {
    redirect("/admin");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email-address"];
        $password = $_POST["password"];

        // is the password field is empty...
        if (empty($password)) {
            $data["password_err"] = "Please enter password.";
        }

        // is the email field is empty...
        if (empty($email)) {
            $data["email_err"] = "Please enter email address.";
        }

        // if neither of the fields produced an error...
        if (empty($data["email_err"]) && empty($data["password_err"])) {
            $user = User::getUser($email);

            // if the user provided email gave us a user
            if ($user) {
                // if the user provided password matches the one in the database...
                if (password_verify($password, $user["password"])) {
                    $_SESSION["id"] = $user["id"];
                    $_SESSION["email"] = $user["email"];
                    redirect("/admin");
                } else {
                    $data["login_err"] = "Wrong credentials. Please try again.";
                }
            } else {
                $data["login_err"] = "Wrong credentials. Please try again.";
            }
        }
    }
}

view("admin", "login", $data);

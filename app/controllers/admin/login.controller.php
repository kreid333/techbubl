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

        $is_emailFormatted = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);

        // if the password or email field was not filled in...
        if (empty($password) || empty($email)) {
            $data["login_err"] = "Please fill in all fields.";
        }

        // if both fields were filled...
        if (empty($data["login_err"])) {

            // if the email is formatted correctly...
            if ($is_emailFormatted) {
                $user = User::getUser($email);

                // if the user provided email gave us a user...
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
            } else {
                $data["login_err"] = "Invalid email format.";
            }
        }
    }
}

view("admin", "login", $data);

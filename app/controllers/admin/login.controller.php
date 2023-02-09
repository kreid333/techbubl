<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");

session_start();
$data = [];

// checking to see if the user is already logged in
if (isset($_SESSION["author_id"])) {
    redirect("/admin");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email-address"];
        $password = $_POST["password"];

        // checking for empty password from user
        if (empty($password)) {
            $data["password_err"] = "Please enter password.";
        }

        // checking for empty email address from user
        if (empty($email)) {
            $data["email_err"] = "Please enter email address.";
        }

        // checking for empty errors
        if (empty($data["email_err"]) && empty($data["password_err"])) {
            $user = User::login($email);
            // if the user provided email gave us a user
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["author_id"] = $user["id"];
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

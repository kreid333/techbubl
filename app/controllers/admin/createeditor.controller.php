<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
require(dirname(__FILE__, 3) . "/models/Verification.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // if either of the name fields are empty...
        if (empty($_POST["first-name"]) || empty($_POST["last-name"])) {
            $data["name_err"] = "Please fill in all name fields.";
        }

        // if the email field is empty...
        if (empty($_POST["email-address"])) {
            $data["email_err"] = "Please enter email address.";
        }

        // if all fields are not empty...
        if (!empty($_POST["first-name"]) && !empty($_POST["last-name"]) && !empty($_POST["email-address"])) {
            $users = User::getUsers();

            // looping through all users to see if the provided email already exitsts
            for ($i = 0; $i < count($users); $i++) {
                if ($users[$i][0] == $_POST["email-address"]) {
                    $data["email-in-use_err"] = $_POST["email-address"] . " is already in use. Please try again.";
                    break;
                }
            }

            // if the provided email does not exist already...
            if (!isset($data["email-in-use_err"])) {
                $uid = uniqid();
                $full_name = $_POST["first-name"] . " " . $_POST["last-name"];
                User::createUser($_POST["first-name"], $_POST["last-name"], $_POST["role"], $_POST["email-address"]);
                $createdUser = User::getUser($_POST["email-address"]);
                Verification::createVerificationCode($createdUser["id"], $uid);
                $confirmEmail = sendEmail($_POST["email-address"], $full_name, $uid);
                $data["email_mess"] = $confirmEmail;
            }
        }
    }
}

view("admin", "createeditor", $data);

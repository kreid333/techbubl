<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Users.php");
require(dirname(__FILE__, 3) . "/models/Verification.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    // if the admin user is an admin...
    if ($_SESSION["role"] == "Admin") {
        
        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
            $first_name = trim($_POST["first-name"]);
            $last_name = trim($_POST["last-name"]);
            $role = $_POST["role"];

            // validating the format of the given email
            $formattedEmail = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);

            // if any field is empty or the given email is not formatted correctly...
            if (empty($first_name) || empty($last_name) || !$formattedEmail) {
                $data["err"] = "Please fill in all fields correctly.";
            }

            // if all fields are not empty and the given email is formatted correctly...
            if (!empty($first_name) && !empty($last_name) && $formattedEmail) {
                $users = Users::getUsers();

                // looping through all users to see if the provided email already exitsts
                for ($i = 0; $i < count($users); $i++) {
                    if ($users[$i][0] == $formattedEmail) {
                        $data["err"] = $_POST["email-address"] . " is already in use. Please try again.";
                        break;
                    }
                }

                // if the "err" key for the data array is not set...
                if (!isset($data["err"])) {
                    $code = uniqid();
                    $full_name = $first_name . " " . $last_name;

                    // create user
                    Users::createUser($first_name, $last_name, $role, $formattedEmail);

                    // retrieve the created user and create a verification code for them
                    $createdUser = Users::getUserByEmail($formattedEmail);
                    Verification::createVerificationCode($createdUser["id"], $code);

                    $subject = "Verify your account";
                    $body = '<span style="display: block;">Please click the link below to verify your account.</span>
                    <a href="localhost/admin/verifyaccount?c=' . $code . '" style="display: block; margin-top: 10px;">Click here</a>';

                    sendEmail($formattedEmail, $full_name, $subject, $body);
                    $data["success"] = "A verification email has been sent to " . $formattedEmail . ".";
                }
            }
        }
    } else {
        redirect("/admin");
    }
}

view("admin/createeditor", $data);

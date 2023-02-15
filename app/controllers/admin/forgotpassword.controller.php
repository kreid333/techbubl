<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
require(dirname(__FILE__, 3) . "/models/Verification.php");

$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_emailFormatted = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);

    // if the email field is empty...
    if (empty($_POST["email-address"])) {
        $data["email_err"] = "Please enter email address.";
    }

    // if the email field is not empty AND is not formatted as an email should be...
    if (!empty($_POST["email-address"]) && !$is_emailFormatted) {
        $data["email_err"] = "Invalid email format";
    }

    // if the email field is not empty AND is formatted correctly...
    if (!empty($_POST["email-address"]) && $is_emailFormatted) {
        $acc_found;
        $users = User::getUsers();

        // looping through all users to see if the provided email exitsts as well as if they are verified
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i][0] == $_POST["email-address"] && $users[$i][1] != 0) {
                $acc_found = true;
                break;
            } else {
                $acc_found = false;
            }
        } 

        // if the provided email exists...
        if ($acc_found) {
            $code = uniqid();
            $user = User::getUser($_POST["email-address"]);
            $full_name = $user["first_name"] . " " . $user["last_name"];
            Verification::createVerificationCode($user["id"], $code);

            $subject = "Reset Password";
            $body = '<span style="display: block;">Please click the link below to reset your password.</span>
            <a href="localhost/admin/resetpassword?c=' . $code . '" style="display: block; margin-top: 10px;">Click here</a>';

            sendEmail($_POST["email-address"], $full_name, $subject, $body);
            $data["success"] = "A reset link has been sent to " . $_POST["email-address"] . ".";
        } else {
            $data["email_err"] = "Account not found. Please try again.";
        }
    }
}

view("admin/forgotpassword", $data);

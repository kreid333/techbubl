<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
require(dirname(__FILE__, 3) . "/models/Verification.php");

$data = [];

// if the request method is POST and the POST variable "newsletter-email" is not set...
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
    // validating the format of the given email
    $formattedEmail = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);

    // if the email is not formatted properly...
    if (!$formattedEmail) {
        $data["err"] = "Invalid email format";
    }

    // if the email field is formatted correctly...
    if ($formattedEmail) {
        $acc_found;
        $users = User::getUsers();

        // looping through all users to see if the provided email exitsts as well as if they are verified
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i][0] == $formattedEmail && $users[$i][1] != 0) {
                $acc_found = true;
                break;
            } else {
                $acc_found = false;
            }
        }

        // if the provided email exists...
        if ($acc_found) {
            $code = uniqid();
            $user = User::getUser($formattedEmail);
            $full_name = $user["first_name"] . " " . $user["last_name"];

            Verification::createVerificationCode($user["id"], $code);

            $subject = "Reset Password";
            $body = '<span style="display: block;">Please click the link below to reset your password.</span>
            <a href="localhost/admin/resetpassword?c=' . $code . '" style="display: block; margin-top: 10px;">Click here</a>';

            sendEmail($formattedEmail, $full_name, $subject, $body);
            $data["success"] = "A reset link has been sent to " . $formattedEmail . ".";
        } else {
            $data["err"] = "Account not found. Please try again.";
        }
    }
}

view("admin/forgotpassword", $data);

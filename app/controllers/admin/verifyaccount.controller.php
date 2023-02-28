<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Verification.php");
session_start();

$data = [];

$codes = Verification::getCodes();

$is_valid;

// looping through all codes to see if the one in the url exists in the database
for ($i = 0; $i < count($codes); $i++) {
    if ($codes[$i][0] == $_GET["c"]) {
        $is_valid = true;
        break;
    } else {
        $is_valid = false;
    }
}

if ($is_valid) {
    // if the request method is POST and the POST variable "newsletter-email" is not set...
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
        $createPassword = $_POST["create-password"];
        $confirmPassword = $_POST["confirm-password"];

        // if either of the password fields are empty...
        if (empty($createPassword) || empty($confirmPassword)) {
            $data["err"] = "Please fill out both fields.";
        }

        // if the both of the password fields do not match and they are not empty...
        if ($createPassword !== $confirmPassword && !empty($createPassword) && !empty($confirmPassword)) {
            $data["err"] = "Passwords do not match. Please try again";
        }

        // if both password fields are not empty and they match...
        if (!empty($createPassword) && !empty($confirmPassword) && $createPassword === $confirmPassword) {
            $user_id = Verification::getUser($_GET["c"]);
            $hashedPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
            Verification::createPassword($user_id[1], $hashedPassword);

            $_SESSION["id"] = $user_id[0];
            $_SESSION["verified"] = true;

            redirect("/success");
        }
    }
} else {
    redirect("/admin/login");
}

view("admin/verifyaccount", $data);

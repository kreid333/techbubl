<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Users.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $user = Users::getUserByID($_SESSION["id"]);

    // if the request method is POST and the POST variable "newsletter-email" is not set...
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
        $oldPassword = $_POST["old-password"];
        $newPassword = $_POST["new-password"];
        $confirmNewPassword = $_POST["confirm-new-password"];

        // if all fields are not empty...
        if (!empty($oldPassword) && !empty($newPassword) && !empty($confirmNewPassword)) {

            // if the new password and the confirmed new password match...
            if ($newPassword === $confirmNewPassword) {

                // if the given old password matches the password stored in the database...
                if (password_verify($oldPassword, $user["password"])) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    Users::updatePassword($hashedPassword, $_SESSION["id"]);
                    $data["success"] = "Your password has been updated.";
                } else {
                    $data["err"] = "Your old password is incorrect. Please try again.";
                }
            } else {
                $data["err"] = "Your new password could not be confirmed. Please try again.";
            }
        } else {
            $data["err"] = "You cannot submit a post with blank fields.";
        }
    }
}

view("admin/editpassword", $data);

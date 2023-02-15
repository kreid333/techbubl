<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $user = User::getUserByID($_SESSION["id"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $oldPassword = $_POST["old-password"];
        $newPassword = $_POST["new-password"];
        $confirmNewPassword = $_POST["confirm-new-password"];

        if (!empty($oldPassword) && !empty($newPassword) && !empty($confirmNewPassword)) {
            if ($newPassword === $confirmNewPassword) {
                if (password_verify($_POST["old-password"], $user["password"])) {
                    $hashedPassword = password_hash($_POST["new-password"], PASSWORD_DEFAULT);
                    User::updatePassword($hashedPassword, $user["id"]);
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

view("admin", "editpassword", $data);

<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Users.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    // if the request method is GET... 
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $data["user"] = Users::getUserByID($_SESSION["id"]);
    }

    // if the request method is POST and the POST variable "newsletter-email" is not set...
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
        $first_name = trim($_POST["first-name"]);
        $last_name = trim($_POST["last-name"]);

        // validating the format of the given email
        $formattedEmail = filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL);

        // if any field is empty or the given email is not formatted correctly...
        if (empty($first_name) || empty($last_name) || !$formattedEmail) {
            $data["err"] = "Please fill in all fields correctly.";
        }

        // if the "err" key for the data array is not set...
        if (!isset($data["err"])) {
            Users::updateUser($first_name, $last_name, $formattedEmail, $_SESSION["id"]);
            $data["user"] = Users::getUserByID($_SESSION["id"]);
            $data["success"] = "Your info has been updated.";
        }
    }
}

view("admin/editinfo", $data);

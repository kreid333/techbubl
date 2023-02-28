<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Users.php");

session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    // if the admin user is an admin...
    if ($_SESSION["role"] == "Admin") {
        $data["editors"] = Users::getEditors();

        // if the GET variable "id" is set...
        if (isset($_GET["id"])) {
            $data["editor"] = Users::getUserByID($_GET["id"]);
        }

        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
            Users::deleteUser($_GET["id"]);
            redirect("/admin/vieweditors");
        }
    } else {
        redirect("/admin");
    }
}

view("admin/vieweditors", $data);

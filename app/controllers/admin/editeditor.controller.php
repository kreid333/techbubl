<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["user"] = User::getUserByID($_GET["id"]);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        User::updateUser($_POST["first-name"], $_POST["last-name"], $_POST["email-address"], $data["user"]["id"]);
        redirect("/admin/vieweditors");
    }
}

view("admin/editeditor", $data);
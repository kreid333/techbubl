<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["user"] = User::getUser($_SESSION["email"]);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        User::updateUser($_POST["first-name"], $_POST["last-name"], $_POST["email-address"], $_SESSION["id"]);
        redirect("/admin");
    }
}

view("admin", "editinfo", $data);

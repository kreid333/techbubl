<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");

session_start();

if (isset($_SESSION["author_id"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    User::updateUser($_POST["first-name"], $_POST["last-name"], $_POST["email-address"], $_SESSION["author_id"]);
    redirect("/admin");
}
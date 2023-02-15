<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");

session_start();

$data = [];

if (isset($_GET["id"])) {
    $data["editor"] = User::getUserByID($_GET["id"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    User::deleteUser($_GET["id"]);
    redirect("/admin/vieweditors");
}

$data["editors"] = User::getEditors();

view("admin/vieweditors", $data);

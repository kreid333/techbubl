<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
}

$data["editors"] = User::getEditors();

view("admin", "vieweditors", $data);

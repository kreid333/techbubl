<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
session_start();

$data = [];

if (!isset($_SESSION["author_id"])) {
    redirect("/admin/login");
} else {
    $data["author"] = User::getUser($_SESSION["author_id"]);
}

view("admin", "index", $data);

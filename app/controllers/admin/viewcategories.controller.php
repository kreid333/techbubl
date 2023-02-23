<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
}

$data["categories"] = Categories::getCategories();

view("admin/viewcategories", $data);

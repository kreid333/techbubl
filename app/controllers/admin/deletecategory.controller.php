<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");

session_start();

$data = [];

if (isset($_GET["id"])) {
    $data["category"] = Categories::getCategoryByID($_GET["id"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Categories::deleteCategory($_GET["id"]);
    redirect("/admin/viewcategories");
}

$data["categories"] = Categories::getCategories();

view("admin/viewcategories", $data);

<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else if ($_SESSION["role"] == "Editor") {
    redirect("/admin");
}

$data["categories"] = Categories::getCategories();

view("admin/viewcategories", $data);

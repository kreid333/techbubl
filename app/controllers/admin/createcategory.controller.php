<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["category-name"])) {
            $data["err"] = "Please provide a category name";
        } else {
            Categories::createCategory($_POST["category-name"]);
            $data["success"] = "Category successfully created";
        }
    }
}

view("admin/createcategory", $data);

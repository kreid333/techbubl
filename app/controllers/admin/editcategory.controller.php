<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["category"] = Categories::getCategoryByID($_GET["id"]);

    if ($_SESSION["role"] == "Admin") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST["editcategory-name"]))) {
                $data["err"] = "You cannot update the category name with a blank field.";
            } else {
                Categories::updateCategory($_POST["editcategory-name"], $_GET["id"]);
                redirect("/admin/viewcategories");
            }
        }
    } else {
        redirect("/admin");
    }
}

view("admin/editcategory", $data);

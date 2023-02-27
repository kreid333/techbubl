<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    // if the admin user is an admin...
    if ($_SESSION["role"] == "Admin") {
        
        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
            $category_name = trim($_POST["category-name"]);

            // if the category name field is empty...
            if (empty($category_name)) {
                $data["err"] = "Please provide a category name.";
            } else {
                Categories::createCategory($_POST["category-name"]);
                $data["success"] = "Category successfully created.";
            }
        }
    } else {
        redirect("/admin");
    }
}

view("admin/createcategory", $data);

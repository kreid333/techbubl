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
        $data["category"] = Categories::getCategoryByID($_GET["id"]);
        
        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
            $category_name = trim($_POST["editcategory-name"]);

            // if the category name field is empty...
            if (empty($category_name)) {
                $data["err"] = "You cannot update the category name with a blank field.";
            } else {
                Categories::updateCategory($category_name, $_GET["id"]);
                redirect("/admin/viewcategories");
            }
        }
    } else {
        redirect("/admin");
    }
}

view("admin/editcategory", $data);

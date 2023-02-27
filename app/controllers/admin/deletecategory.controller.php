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
        $data["categories"] = Categories::getCategories();

        // if the GET variable "id" is set...
        if (isset($_GET["id"])) {
            $data["category"] = Categories::getCategoryByID($_GET["id"]);
        }

        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
            Categories::deleteCategory($_GET["id"]);
            redirect("/admin/viewcategories");
        }
    } else {
        redirect("/admin");
    }
}

view("admin/viewcategories", $data);

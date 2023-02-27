<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["categories"] = Categories::getCategories();

    // if the request method is POST and the POST variable "newsletter-email" is not set...
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
        $category = $_POST["category"];
        $title = trim($_POST["title"]);
        $body = $_POST["body"];

        // if any field is empty...
        if (empty($category) || empty($title) || empty($body)) {
            $data["err"] = "You cannot submit a post with blank fields.";
        } else {
            if (Posts::createPost($_SESSION["id"], $category, $title, $body)) {
                redirect("/admin");
            } else {
                $data["err"] = "There was an error creating the post.";
            }
        }
    }
}

view("admin/createpost", $data);

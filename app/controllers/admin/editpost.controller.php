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
    $data["post"] = Posts::getPostByID($_GET["id"]);
    // if the session id matches the post's user id or if the session is admin...
    if ($_SESSION["id"] == $data["post"]["user_id"] || $_SESSION["role"] == "Admin") {
        $data["categories"] = Categories::getCategories();

        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {

            // if any field is empty...
            if (empty($_POST["category"]) || empty($_POST["title"]) || empty($_POST["body"])) {
                $data["err"] = "You cannot submit a post with blank fields.";
            } else {
                if (Posts::updatePost($_POST["category"], $_POST["title"], $_POST["body"], $_GET["id"])) {
                    redirect("/admin");
                } else {
                    $data["err"] = "There was an error creating the post.";
                }
            }
        }
    } else {
        redirect("/admin");
    }
}

view("admin/editpost", $data);

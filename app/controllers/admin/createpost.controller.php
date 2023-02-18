<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["categories"] = Categories::getCategories();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["category"]) ||empty($_POST["title"]) || empty($_POST["body"])) {
            $data["publish_err"] = "You cannot submit a post with blank fields.";
        } else {
            if (Posts::createPost($_SESSION["id"], $_POST["category"], $_POST["title"], $_POST["body"])) {
                redirect("/admin");
            } else {
                $data["publish_err"] = "There was an error creating the post.";
            }
        }
    }
}

view("admin/createpost", $data);

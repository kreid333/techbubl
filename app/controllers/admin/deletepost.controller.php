<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Users.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
session_start();

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["user"] = Users::getUserByID($_SESSION["id"]);

    if ($_SESSION["role"] == "Admin") {
        $data["posts"] = Posts::getPosts();
        $data["num_of_results"] = count($data["posts"]);
    }

    if ($_SESSION["role"] == "Editor") {
        $data["posts"] = Posts::getPostsByID($_SESSION["id"]);
        $data["num_of_results"] = count($data["posts"]);
    }

    if (isset($_GET["id"])) {
        $data["post"] = Posts::getPostByID($_GET["id"]);
    }
    
    // if the request method is POST and the POST variable "newsletter-email" is not set...
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
        Posts::deletePost($_GET["id"]);
        redirect("/admin");
    }
}

view("admin/index", $data);
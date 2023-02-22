<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/User.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["user"] = User::getUser($_SESSION["email"]);
    if ($_SESSION["role"] == "Admin") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data["posts"] = Posts::searchPosts($_POST["search"]);
        } else {
            $data["posts"] = Posts::getPosts();
        }
    }

    if ($_SESSION["role"] == "Editor") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data["posts"] = Posts::searchPostsByID($_SESSION["id"], $_POST["search"]);
        } else {
            $data["posts"] = Posts::getPostsByID($_SESSION["id"]);
        }
    }
}

view("admin/index", $data);

<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"]) || empty($_POST["body"])) {
        $data["publish_err"] = "You cannot submit a post with blank fields.";
    } else {
        Posts::createPost($_SESSION["id"], $_POST["title"], $_POST["body"]);
        redirect("/admin");
    }
}

view("admin/createpost", $data);
<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
session_start();

$data = [];

if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["post"] = Posts::getPostByID($_GET["id"]);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["title"]) || empty($_POST["body"])) {
            $data["publish_err"] = "You cannot submit a post with blank fields.";
        } else {
            Posts::updatePost($_POST["title"], $_POST["body"], $_GET["id"]);
            redirect("/admin");
        }
    }
}

view("admin/editpost", $data);

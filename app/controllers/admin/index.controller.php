<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Users.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
session_start();

$data = [];

// if the id of admin user is not stored in a session variable...
if (!isset($_SESSION["id"])) {
    redirect("/admin/login");
} else {
    $data["user"] = Users::getUserByID($_SESSION["id"]);

    if ($_SESSION["role"] == "Admin") {
        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
            $search = trim($_POST["search"]);

            // if the search field is not empty...
            if (!empty($search)) {
                $data["posts"] = Posts::searchPosts($search);

                // if the key "posts" in the data array is empty, due to the search term not being found in the database...
                if (empty($data["posts"])) {
                    $data["posts"] = Posts::getPosts();
                    $data["err"] = 'No posts found containing "' . $search . '"';
                }
            } else {
                $data["posts"] = Posts::getPosts();
                $data["err"] = "Your search cannot be empty.";
            }
        } else {
            $data["posts"] = Posts::getPosts();
        }
    }

    if ($_SESSION["role"] == "Editor") {

        // if the request method is POST and the POST variable "newsletter-email" is not set...
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["newsletter-email"])) {
            $search = trim($_POST["search"]);

            // if the search field is not empty...
            if (!empty($search)) {
                $data["posts"] = Posts::searchPostsByID($_SESSION["id"], $search);

                // if the key "posts" in the data array is empty, due to the search term not being found in the database...
                if (empty($data["posts"])) {
                    $data["posts"] = Posts::getPostsByID($_SESSION["id"]);
                    $data["err"] = 'No posts found containing "' . $search . '"';
                }
            } else {
                $data["posts"] = Posts::getPostsByID($_SESSION["id"]);
                $data["err"] = "Your search cannot be empty.";
            }
        } else {
            $data["posts"] = Posts::getPostsByID($_SESSION["id"]);
        }
    }

    if (!isset($_POST["search"]) || empty(trim($_POST["search"]))) {
        // if the GET variable "page" is set...
        if (isset($_GET["page"])) {
            $data["page_num"] = $_GET["page"];
        } else {
            $data["page_num"] = 1;
        }

        // if the page number is greater than 0...
        if ($data["page_num"] > 0) {
            $data["num_of_results"] = count($data["posts"]);

            $Paginator = new Paginator($data["page_num"], $data["num_of_results"]);

            if ($_SESSION["role"] == "Editor") {
                $data["posts"] = $Paginator->getPostsByID($_SESSION["id"]);
            } else {
                $data["posts"] = $Paginator->getPosts();
            }

            $data["num_of_pages"] = $Paginator->num_of_pages;

            if ($data["num_of_pages"] == 0 && $data["page_num"] == 1) {
                $page = "admin/index";
            } else if ($data["page_num"] <= $data["num_of_pages"]) {
                $page = "admin/index";
            } else {
                $page = "notfound";
            }
        } else {
            $page = "notfound";
        }
    }
}

view($page, $data);

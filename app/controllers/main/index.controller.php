<?php
require_once(dirname(__FILE__, 4) . "/helpers/functions.php");
require_once(dirname(__FILE__, 4) . "/helpers/classes.php");
require_once(dirname(__FILE__, 3) . "/models/Posts.php");
require_once(dirname(__FILE__, 3) . "/models/Categories.php");

$data = [];

// setting category_title in the data array if the requested uri exists
if (strpos($_SERVER["REQUEST_URI"], "/crypto") !== false) {
    $data["category_title"] = "Cryptocurrency";
} else if (strpos($_SERVER["REQUEST_URI"], "/webdev") !== false) {
    $data["category_title"] = "Web Development";
} else if (strpos($_SERVER["REQUEST_URI"], "/ai") !== false) {
    $data["category_title"] = "Artificial Intelligence";
}

// if category_title is set in the data array...
if (isset($data["category_title"])) {
    $data["posts"] = Categories::getCategory($data["category_title"]);
} else {
    $data["posts"] = Posts::getPosts();
}

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

    $data["num_of_pages"] = $Paginator->num_of_pages;

    if (isset($data["category_title"])) {
        $data["posts"] = $Paginator->getPostsByCategory($data["category_title"]);
    } else {
        $data["posts"] = $Paginator->getPosts();
    }

    if ($data["page_num"] <= $data["num_of_pages"] || $data["num_of_results"] == 0) {
        $page = "main/index";
    } else {
        $page = "notfound";
    }
} else {
    $page = "notfound";
}

view($page, $data);

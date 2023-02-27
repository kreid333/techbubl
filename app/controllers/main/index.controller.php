<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");
require(dirname(__FILE__, 3) . "/models/Categories.php");

$data = [];

// if the requested uri is not "/"...
if ($_SERVER["REQUEST_URI"] != "/") {
    switch ($_SERVER["REQUEST_URI"]) {
        case "/crypto":
            $data["category_title"] = "Cryptocurrency";
            break;
        case "/webdev":
            $data["category_title"] = "Web Development";
            break;
        case "/ai":
            $data["category_title"] = "Artificial Intelligence";
            break;
    }

    $data["posts"] = Categories::getCategory($data["category_title"]);
}

// if the requested uri is "/"...
if ($_SERVER["REQUEST_URI"] == "/") {
    $data["posts"] = Posts::getPosts();
}


view("main/index", $data);

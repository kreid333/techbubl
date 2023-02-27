<?php
require(dirname(__FILE__, 3) . "/helpers/functions.php");
require(dirname(__FILE__, 2) . "/models/Posts.php");

// data array
$data = [];

// if the request method is GET and the GET variable "term" is not empty...
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["term"])) {
    $data["posts"] = Posts::searchPosts($_GET["term"]);
}

// if the "posts" key in the data array is empty...
if (empty($data["posts"])) {
    $data["err"] = 'No such records exist containing the term "' . $_GET["term"] . '".'; 
}

view("search", $data);

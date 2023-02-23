<?php
require(dirname(__FILE__, 3) . "/helpers/functions.php");
require(dirname(__FILE__, 2) . "/models/Posts.php");

$data = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["term"])) {
    $data["posts"] = Posts::searchPosts($_GET["term"]);
}

if (empty($data["posts"])) {
    $data["err"] = 'No such records exist containing the term "' . $_GET["term"] . '".'; 
}


view("search", $data);

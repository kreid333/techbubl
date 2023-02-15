<?php
require(dirname(__FILE__, 3) . "/helpers/functions.php");
require(dirname(__FILE__, 2) . "/models/Posts.php");

$data["post"] = Posts::getPostByID($_GET["id"]);

view("post", $data);
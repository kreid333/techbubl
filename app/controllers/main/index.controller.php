<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Posts.php");

$data = [];

$data["posts"] = Posts::getPosts();

view("main/index", $data);
<?php
require(dirname(__FILE__, 3) . "/helpers/functions.php");
require(dirname(__FILE__, 2) . "/models/Posts.php");

// set the value for the "posts" key in the data array to a specific post
$data["post"] = Posts::getPostByID($_GET["id"]);

// updating the view count of the post once the post is viewed
$updatedCount = ++$data["post"]["view_count"];

// updating the view count in the database
Posts::updateViewCount($updatedCount, $_GET["id"]);

view("post", $data);
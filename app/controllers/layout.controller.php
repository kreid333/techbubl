<?php
require(dirname(__FILE__, 2) . "/models/Newsletter.php");
if (!class_exists("Posts")) {
    require(dirname(__FILE__, 2) . "/models/Posts.php");
}

if (!isset($data)) {
    $data = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_emailFormatted = filter_var($_POST["newsletter-email"], FILTER_VALIDATE_EMAIL);
    if ($is_emailFormatted && !empty($_POST["newsletter-email"])) {
        Newsletter::createSubscriber($_POST["newsletter-email"]);
        $data["success"] = "You are now signed up for the DailyBubl newsletter!";

        $body = $body = '<span style="display: block;">Welcome to the DailyBubl newsletter! We are honored that you have chosen us as your new source of 
        information for Cryptocurrency, Web Development, and Artifcial Inelligence.</span>';

        sendEmail($_POST["newsletter-email"], "", "You are now subscribed to the DailyBubl newsletter!", $body);
    } else {
        $data["err"] = "Invalid email address.";
    }
}

$data["recent_posts"] = Posts::getMostRecentAside();
$data["popular_posts"] = Posts::getMostPopularAside();

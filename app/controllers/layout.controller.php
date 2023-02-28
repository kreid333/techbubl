<?php
require(dirname(__FILE__, 2) . "/models/Newsletter.php");

// if the "Posts" class does not exist, require the file that stores the class...
if (!class_exists("Posts")) {
    require(dirname(__FILE__, 2) . "/models/Posts.php");
}

// if the "User" class does not exist, require the file that stores the class...
if (!class_exists("Users")) {
    require(dirname(__FILE__, 2) . "/models/Users.php");
}

// if the $data variable is not set...
if (!isset($data)) {
    $data = [];
}

// if the request method is POST and the POST variable "newsletter-email" is set...
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newsletter-email"])) {

    // retrieving all users
    $users = Users::getUsers();

    // validating the format of the given email
    $formattedEmail = filter_var($_POST["newsletter-email"], FILTER_VALIDATE_EMAIL);

    // looping through all users to see if the provided email already exitsts
    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i][0] == $formattedEmail) {
            $data["newsletter_err"] = $formattedEmail . " is already in use. Please try again.";
            break;
        }
    }

    // if the email is formatted properly and the "newsletter_err" key in the data array is not set...
    if ($formattedEmail && !isset($data["newsletter_err"])) {
        Newsletter::createSubscriber($formattedEmail);
        $data["newsletter_success"] = "You are now signed up for the DailyBubl newsletter!";

        $body = $body = '<span style="display: block;">Welcome to the DailyBubl newsletter! We are honored that you have chosen us as your new source of 
        information for Cryptocurrency, Web Development, and Artificial Intelligence.</span>';

        sendEmail($formattedEmail, "", "You are now subscribed to the DailyBubl newsletter!", $body);
    } else {
        
        // if the "newsletter_err" key in the data array is not set...
        if (!isset($data["newsletter_err"])) {
            $data["newsletter_err"] = "Invalid email address.";
        }
    }
}

$data["recent_posts"] = Posts::getMostRecentAside();
$data["popular_posts"] = Posts::getMostPopularAside();

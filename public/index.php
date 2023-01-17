<?php

$request = $_SERVER["REQUEST_URI"];
$root_directory = $_SERVER["DOCUMENT_ROOT"];

switch ($request) {
    case "":
    case "/":
        require($root_directory . "/app/controllers/main/index.controller.php");
        break;

    case "/about":
        require($root_directory . "/app/controllers/main/about.controller.php");
        break;

    case "/contact":
        require($root_directory . "/app/controllers/main/contact.controller.php");
        break;

    default:
        http_response_code(404);
        require($root_directory . "/app/views/404.php");
        break;
}

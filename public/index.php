<?php

$request = $_SERVER["REQUEST_URI"];
$root_directory = $_SERVER["DOCUMENT_ROOT"];

switch ($request) {
    case "":
    case "/":
        require($root_directory . "/app/controllers/main/index.controller.php");
        break;

    case "/about":
    case "/about/":
        require($root_directory . "/app/controllers/main/about.controller.php");
        break;

    case "/contact":
    case "/contact/":
        require($root_directory . "/app/controllers/main/contact.controller.php");
        break;

    case "/admin":
    case "/admin/":
        require($root_directory . "/app/controllers/admin/index.controller.php");
        break;

    case "/admin/login":
    case "/admin/login/":
        require($root_directory . "/app/controllers/admin/login.controller.php");
        break;

    case "/admin/settings":
    case "/admin/settings/":
        require($root_directory . "/app/controllers/admin/settings.controller.php");
        break;

    case "/admin/createnewpost":
    case "/admin/createnewpost/":
        require($root_directory . "/app/controllers/admin/cepost.controller.php");
        break;

    case "/admin/createneweditor":
    case "/admin/createneweditor/":
        require($root_directory . "/app/controllers/admin/neweditor.controller.php");
        break;

    case "/admin/vieweditors":
    case "/admin/vieweditors/":
        require($root_directory . "/app/controllers/admin/vieweditors.controller.php");
        break;

    case "/admin/setpassword":
    case "/admin/setpassword/":
        require($root_directory . "/app/controllers/admin/setpassword.controller.php");
        break;

    case "/admin/editeditor?id=" . $_GET["id"]:
        require($root_directory . "/app/controllers/admin/editeditor.controller.php");
        break;

    case "/admin/editpost?id=" . $_GET["id"]:
        require($root_directory . "/app/controllers/admin/cepost.controller.php");
        break;

    case "/admin/deletepost?id=" . $_GET["id"]:
        require($root_directory . "/app/controllers/admin/deletepost.controller.php");
        break;

    default:
        http_response_code(404);
        require($root_directory . "/app/views/404.php");
        break;
}

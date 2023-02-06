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

    case "/admin/createpost":
    case "/admin/createpost/":
        require($root_directory . "/app/controllers/admin/createpost.controller.php");
        break;

    case "/admin/createeditor":
    case "/admin/createeditor/":
        require($root_directory . "/app/controllers/admin/createeditor.controller.php");
        break;

    case "/admin/vieweditors":
    case "/admin/vieweditors/":
        require($root_directory . "/app/controllers/admin/vieweditors.controller.php");
        break;

    case "/admin/createpassword?uid=" . $_GET["uid"]:
        require($root_directory . "/app/controllers/admin/createpassword.controller.php");
        break;

    case "/admin/editeditor?id=" . $_GET["id"]:
        require($root_directory . "/app/controllers/admin/editeditor.controller.php");
        break;

    case "/admin/editpost?id=" . $_GET["id"]:
        require($root_directory . "/app/controllers/admin/editpost.controller.php");
        break;

    case "/admin/deleteeditor?id=" . $_GET["id"]:
        require($root_directory . "/app/controllers/admin/deleteeditor.controller.php");
        break;

    case "/admin/deletepost?id=" . $_GET["id"]:
        require($root_directory . "/app/controllers/admin/deletepost.controller.php");
        break;

    default:
        http_response_code(404);
        require($root_directory . "/app/views/404.php");
        break;
}

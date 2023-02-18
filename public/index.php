<?php

$request = $_SERVER["REQUEST_URI"];
$root_directory = $_SERVER["DOCUMENT_ROOT"];

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = NULL;
}

if (isset($_GET["c"])) {
    $code = $_GET["c"];
} else {
    $code = NULL;
}

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

    case "/post?id=" . $id:
        require($root_directory . "/app/controllers/post.controller.php");
        break;

    case "/admin":
    case "/admin/":
        require($root_directory . "/app/controllers/admin/index.controller.php");
        break;

    case "/admin/login":
    case "/admin/login/":
        require($root_directory . "/app/controllers/admin/login.controller.php");
        break;

    case "/admin/logout":
    case "/admin/logout/":
        require($root_directory . "/app/controllers/admin/logout.controller.php");
        break;

    case "/admin/settings":
    case "/admin/settings/":
        require($root_directory . "/app/controllers/admin/settings.controller.php");
        break;

    case "/admin/settings/editinfo":
    case "/admin/settings/editinfo/":
        require($root_directory . "/app/controllers/admin/editinfo.controller.php");
        break;

    case "/admin/settings/editpassword":
    case "/admin/settings/editpassword/":
        require($root_directory . "/app/controllers/admin/editpassword.controller.php");
        break;

    case "/admin/createpost":
    case "/admin/createpost/":
        require($root_directory . "/app/controllers/admin/createpost.controller.php");
        break;

    case "/admin/createeditor":
    case "/admin/createeditor/":
        require($root_directory . "/app/controllers/admin/createeditor.controller.php");
        break;

    case "/admin/createcategory":
    case "/admin/createcategory/":
        require($root_directory . "/app/controllers/admin/createcategory.controller.php");
        break;

    case "/admin/vieweditors":
    case "/admin/vieweditors/":
        require($root_directory . "/app/controllers/admin/vieweditors.controller.php");
        break;

    case "/admin/deleteeditor?id=" . $id:
        require($root_directory . "/app/controllers/admin/deleteeditor.controller.php");
        break;

    case "/success":
    case "/success/":
        require($root_directory . "/app/controllers/admin/success.controller.php");
        break;

    case "/admin/forgotpassword":
    case "/admin/forgotpassword/":
        require($root_directory . "/app/controllers/admin/forgotpassword.controller.php");
        break;

    case "/admin/editeditor?id=" . $id:
        require($root_directory . "/app/controllers/admin/editeditor.controller.php");
        break;

    case "/admin/editpost?id=" . $id:
        require($root_directory . "/app/controllers/admin/editpost.controller.php");
        break;

    case "/admin/deleteeditor?id=" . $id:
        require($root_directory . "/app/controllers/admin/deleteeditor.controller.php");
        break;

    case "/admin/deletepost?id=" . $id:
        require($root_directory . "/app/controllers/admin/deletepost.controller.php");
        break;

    case "/admin/verifyaccount?c=" . $code:
        require($root_directory . "/app/controllers/admin/verifyaccount.controller.php");
        break;

    case "/admin/resetpassword?c=" . $code:
        require($root_directory . "/app/controllers/admin/resetpassword.controller.php");
        break;

    default:
        http_response_code(404);
        require($root_directory . "/app/views/404.php");
        break;
}

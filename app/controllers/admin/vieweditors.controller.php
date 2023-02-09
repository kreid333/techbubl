<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
session_start();

if (!isset($_SESSION["author_id"])) {
    redirect("/admin/login");
}

view("admin", "vieweditors");
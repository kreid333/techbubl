<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
session_start();

if(!empty($_SESSION)) {
    session_unset();
    session_destroy();
    redirect("/admin/login");
}
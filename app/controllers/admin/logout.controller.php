<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
session_start();

// if the session array is not empty...
if(!empty($_SESSION)) {
    session_unset();
    session_destroy();
    redirect("/admin/login");
}
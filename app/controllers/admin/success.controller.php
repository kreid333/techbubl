<?php
require(dirname(__FILE__, 4) . "/helpers/functions.php");
require(dirname(__FILE__, 3) . "/models/Verification.php");
session_start();

// if session variable "verified" is not set...
if (!isset($_SESSION["verified"])) {
    redirect("/admin/login");
} else {
    Verification::deleteCode($_SESSION["id"]);
    session_unset();
    session_destroy();
}

view("admin/success");

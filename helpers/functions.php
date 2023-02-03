<?php
function view($area, $name)
{
    require("../app/views/layout.view.php");
}

function redirect($url)
{
    header("Location:$url");
    die();
}

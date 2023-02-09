<?php
function view($area, $name, $data = null)
{
    require("../app/views/layout.view.php");
}

function redirect($url)
{
    header("Location:$url");
    die();
}

<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");
class Categories {
    public static function createCategory($name) {
        $sql = "INSERT INTO categories (name) VALUES (:name);";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["name" => $name]);
        $stmt = NULL;
    }
}
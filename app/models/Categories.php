<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");
class Categories {
    public static function createCategory($name) {
        $sql = "INSERT INTO categories (name) VALUES (:name);";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["name" => $name]);
        $stmt = NULL;
    }

    public static function getCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = DB::conn()->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $categories;
    }
}
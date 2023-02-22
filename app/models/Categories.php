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

    public static function getCategory($category_name) {
        $sql = "SELECT posts.id, first_name, last_name, name, title, DATE_FORMAT(created_at, '%m/%d/%Y') AS date_formatted FROM posts INNER JOIN categories on categories.id = posts.category_id INNER JOIN users on users.id = posts.user_id WHERE name = :category_name";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["category_name" => $category_name]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }
}
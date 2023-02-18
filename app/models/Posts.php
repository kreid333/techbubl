<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");

class Posts {
    public static function createPost($user_id, $category_id, $title, $body) {
        $sql = "INSERT INTO posts (user_id, category_id, title, body) VALUES (:user_id, :category_id, :title, :body)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["user_id" => $user_id, "category_id" => $category_id, "title" => $title, "body" => $body]);
        $stmt = NULL;
        return true;
    }

    public static function getPosts()
    {
        $sql = "SELECT posts.id, first_name, last_name, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM users INNER JOIN posts on posts.user_id = users.id 
        ORDER BY created_at DESC";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function getPostsByID($id)
    {
        $sql = "SELECT posts.id, first_name, last_name, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM users INNER JOIN posts on posts.user_id = users.id WHERE user_id = :id 
        ORDER BY created_at DESC";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function getPostByID($id)
    {
        $sql = "SELECT first_name, last_name, category_id, title, body, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM posts INNER JOIN users on users.id = posts.user_id INNER JOIN categories on categories.id = posts.category_id WHERE posts.id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function updatePost($category_id, $title, $body, $id)
    {
        $sql = "UPDATE posts SET category_id = :category_id, title = :title, body = :body WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["category_id" => $category_id, "title" => $title, "body" => $body, "id" => $id]);
        $stmt = NULL;
        return true;
    }

    public static function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
    }
}
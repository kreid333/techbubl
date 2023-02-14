<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");

class Posts {
    public static function createPost($user_id, $title, $body) {
        $sql = "INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["user_id" => $user_id, "title" => $title, "body" => $body]);
        $stmt = NULL;
    }

    public static function getPosts()
    {
        $sql = "SELECT first_name, last_name, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
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
}
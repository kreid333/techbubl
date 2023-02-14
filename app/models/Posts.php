<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");

class Posts {
    public static function createPost($user_id, $title, $body) {
        $sql = "INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["user_id" => $user_id, "title" => $title, "body" => $body]);
        $stmt = NULL;
    }
}
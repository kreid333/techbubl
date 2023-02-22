<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");

class Posts
{
    // CREATE
    public static function createPost($user_id, $category_id, $title, $body)
    {
        $sql = "INSERT INTO posts (user_id, category_id, title, body) VALUES (:user_id, :category_id, :title, :body)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["user_id" => $user_id, "category_id" => $category_id, "title" => $title, "body" => $body]);
        $stmt = NULL;
        return true;
    }

    // READ
    public static function getPosts()
    {
        $sql = "SELECT posts.id, first_name, last_name, category_id, name, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM posts INNER JOIN users on users.id = posts.user_id INNER JOIN categories on categories.id = posts.category_id 
        ORDER BY created_at DESC";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function getMostRecent()
    {
        $sql = "SELECT posts.id, first_name, last_name, category_id, name, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM posts INNER JOIN users on users.id = posts.user_id INNER JOIN categories on categories.id = posts.category_id 
        ORDER BY created_at DESC";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function getMostPopular()
    {
        $sql = "SELECT posts.id, first_name, last_name, category_id, name, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM posts INNER JOIN users on users.id = posts.user_id INNER JOIN categories on categories.id = posts.category_id 
        ORDER BY view_count DESC";
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
        $sql = "SELECT first_name, last_name, category_id, name, title, body, view_count, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM posts INNER JOIN users on users.id = posts.user_id INNER JOIN categories on categories.id = posts.category_id WHERE posts.id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function getMostRecentAside()
    {
        $sql = "SELECT id, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM posts ORDER BY created_at DESC LIMIT 4";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function getMostPopularAside()
    {
        $sql = "SELECT id, title, view_count FROM posts ORDER BY view_count DESC LIMIT 4";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function searchPosts($search)
    {
        $sql = "SELECT posts.id, first_name, last_name, DATE_FORMAT(created_at, '%m/%d/%Y') AS date_formatted, title, name FROM posts 
        INNER JOIN users on users.id = posts.user_id 
        INNER JOIN categories on categories.id = posts.category_id 
        WHERE title LIKE :search
        OR first_name LIKE :search
        OR last_name LIKE :search
        OR name LIKE :search";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["search" => "%" . $search . "%"]);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $posts;
    }

    public static function searchPostsByID($id, $search)
    {
        $sql = "SELECT posts.id, first_name, last_name, DATE_FORMAT(created_at, '%m/%d/%Y') AS date_formatted, title, name AS category_name FROM posts 
        INNER JOIN users on users.id = posts.user_id 
        INNER JOIN categories on categories.id = posts.category_id 
        WHERE posts.user_id = :id 
        AND (title LIKE :search 
        OR name LIKE :search 
        OR first_name LIKE :search
        OR last_name LIKE :search)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id, "search" => "%" . $search . "%"]);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $posts;
    }


    // UPDATE
    public static function updatePost($category_id, $title, $body, $id)
    {
        $sql = "UPDATE posts SET category_id = :category_id, title = :title, body = :body WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["category_id" => $category_id, "title" => $title, "body" => $body, "id" => $id]);
        $stmt = NULL;
        return true;
    }

    public static function updateViewCount($view_count, $id)
    {
        $sql = "UPDATE posts SET view_count = :view_count WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["view_count" => $view_count, "id" => $id]);
        $stmt = NULL;
        return true;
    }

    // DELETE
    public static function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
    }
}

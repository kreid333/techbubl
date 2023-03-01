<?php
require(dirname(__FILE__, 2) . "/config/config.php");
class DB
{
    private static $pdo = null;
    public static function conn()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return self::$pdo;
    }
}

class Paginator
{
    // number of results to retrieve per page
    private $results_per_page = 12;
    private $page_num;
    public $num_of_pages;
    private $num_of_results;

    public function __construct($page_num, $num_of_results)
    {
        $this->page_num = $page_num;
        $this->num_of_results = $num_of_results;

        // the total number of pages that will be displayed
        $this->num_of_pages = ceil($this->num_of_results / $this->results_per_page);
    }

    public function getPosts()
    {
        // the starting post number for the LIMIT clause
        $page_first_result = ($this->page_num - 1) * $this->results_per_page;

        $sql = "SELECT posts.id, first_name, last_name, category_id, name, title, DATE_FORMAT(created_at, '%m/%d/%Y') 
        AS date_formatted FROM posts INNER JOIN users on users.id = posts.user_id INNER JOIN categories on categories.id = posts.category_id 
        ORDER BY created_at DESC LIMIT " . $page_first_result . ", " . $this->results_per_page;
        $stmt = DB::conn()->query($sql);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $posts;
    }

    public function getPostsByCategory($category_name)
    {
        // the starting post number for the LIMIT clause
        $page_first_result = ($this->page_num - 1) * $this->results_per_page;

        $sql = "SELECT posts.id, first_name, last_name, name, title, DATE_FORMAT(created_at, '%m/%d/%Y') AS date_formatted FROM posts 
        INNER JOIN categories on categories.id = posts.category_id 
        INNER JOIN users on users.id = posts.user_id 
        WHERE name = :category_name 
        ORDER BY created_at DESC 
        LIMIT " . $page_first_result . ", " . $this->results_per_page;
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["category_name" => $category_name]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public function getPostsByID($id)
    {
        // the starting post number for the LIMIT clause
        $page_first_result = ($this->page_num - 1) * $this->results_per_page;

        $sql = "SELECT posts.id, first_name, last_name, name, title, DATE_FORMAT(created_at, '%m/%d/%Y') AS date_formatted FROM posts 
        INNER JOIN categories on categories.id = posts.category_id 
        INNER JOIN users on users.id = posts.user_id 
        WHERE posts.user_id = :id
        ORDER BY created_at DESC 
        LIMIT " . $page_first_result . ", " . $this->results_per_page;
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }
}

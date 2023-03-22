<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");
class Newsletter {
    public static function createSubscriber($email) {
        $sql = "INSERT INTO newsletter (email) VALUES (:email);";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["email" => $email]);
        $stmt = NULL;
    }

    public static function getSubscribers()
    {
        $sql = "SELECT email FROM newsletter";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_NUM);
        $stmt = NULL;
        return $users;
    }
}
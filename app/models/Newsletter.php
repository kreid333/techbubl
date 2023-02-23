<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");
class Newsletter {
    public static function createSubscriber($email) {
        $sql = "INSERT INTO newsletter (email) VALUES (:email);";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["email" => $email]);
        $stmt = NULL;
    }
}
<?php
require(dirname(__FILE__, 3) . "/helpers/classes.php");
class User {
    public static function login($user_email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["email" => $user_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getUser($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function updateUser($first_name, $last_name, $email, $id) {
        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["first_name" => $first_name, "last_name" => $last_name, "email" => $email, "id" => $id]);
    }
}
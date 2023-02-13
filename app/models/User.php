<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");
class User
{
    public static function getUser($user_email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["email" => $user_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $user;
    }

    public static function getUserByID($id)
    {
        $sql = "SELECT id, first_name, last_name, role, email FROM users WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $user;
    }

    public static function getUsers()
    {
        $sql = "SELECT email, is_verified FROM users";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_NUM);
        $stmt = NULL;
        return $users;
    }

    public static function updateUser($first_name, $last_name, $email, $id)
    {
        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["first_name" => $first_name, "last_name" => $last_name, "email" => $email, "id" => $id]);
        $stmt = NULL;
    }

    public static function createUser($first_name, $last_name, $role, $email)
    {
        $sql = "INSERT INTO users (first_name, last_name, role, email, password, is_verified) VALUES (:first_name, :last_name, :role, :email, NULL, 0)";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["first_name" => $first_name, "last_name" => $last_name, "role" => $role, "email" => $email]);
        $stmt = NULL;
    }

    public static function getEditors()
    {
        $sql = "SELECT id, first_name, last_name, role, email FROM users WHERE role = 'Editor'";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = NULL;
        return $users;
    }

    public static function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
    }
}

<?php
require_once(dirname(__FILE__, 3) . "/helpers/classes.php");
class Verification {
    public static function createVerificationCode($user_id, $verification_code) {
        $sql = "INSERT INTO verification (user_id, verification_code) VALUES (:user_id, :verification_code);";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["user_id" => $user_id, "verification_code" => $verification_code]);
        $stmt = NULL;
    }

    public static function getCodes() {
        $sql = "SELECT verification_code FROM verification";
        $stmt = DB::conn()->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_NUM);
        $stmt = NULL;
        return $users;
    }

    public static function getUser($verification_code) {
        $sql = "SELECT id, user_id FROM verification WHERE verification_code = :verification_code";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["verification_code" => $verification_code]);
        $user = $stmt->fetch(PDO::FETCH_NUM);
        $stmt = NULL;
        return $user;
    }

    public static function createPassword($id, $password) {
        $sql = "UPDATE users SET password = :password, is_verified = 1 WHERE id = :id ";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id, "password" => $password]);
        $stmt = NULL;
    }

    public static function updatePassword($id, $password) {
        $sql = "UPDATE users SET password = :password WHERE id = :id ";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id, "password" => $password]);
        $stmt = NULL;
    }

    public static function deleteCode($id) {
        $sql = "DELETE from verification WHERE id = :id";
        $stmt = DB::conn()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $stmt = NULL;
    }
}
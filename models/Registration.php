<?php
class Registration {
	public static function addUser($login, $email, $password) {
		$conn = Db::getConnection();
		$sql = "INSERT INTO shop.user (id, login, email, password) 
				VALUES (NULL, '$login', '$email', '$password')";
		return $conn->query($sql);
	}
	public static function checkUser($email) {
		$conn = Db::getConnection();
		$sql = "SELECT * from user where email='$email'";
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return count($data) == 0;
	}
	public static function checkLogin($login) {
		return strlen($login) >= 2;
	}
	public static function checkEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	public static function checkPassword($password) {
		return strlen($password) >= 6;
	}
}
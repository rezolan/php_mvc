<?php
class Admin {
	public static function addPost($title, $text) {
		$conn = Db::getConnection();
		$sql = "INSERT INTO shop.blog (id, title, text) 
		VALUES (NULL, '$title', '$text')";
		return $conn->query($sql);
	}
}
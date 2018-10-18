<?php
class Admin {
	public static function addPost($title, $text, $img) {
		$imgTmpName = $img['tmp_name'];
		$imgName = iconv("UTF-8", "cp1251", $img['name']);
		$path = "/files/".$img['name'];
		if (move_uploaded_file($imgTmpName, ROOT. "/files/$imgName")) {
        echo "File uploaded";
    } else {
        echo "File didn't upload";
    }
		$conn = Db::getConnection();
		$sql = "INSERT INTO shop.blog (id, title, text, img)
		VALUES (NULL, '$title', '$text', '$path')";
		return $conn->query($sql);
	}
	public static function deletePost($blogId) {
		echo '$blogId', $blogId;
		$conn = Db::getConnection();
		$sql = "DELETE FROM  `blog` WHERE id =$blogId";
		return $conn->query($sql);
	}
		
}
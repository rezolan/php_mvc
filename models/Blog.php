<?php
class Blog {
	public static function getBlogPosts() {
		$conn = Db::getConnection();
		$sql = "SELECT title, blog.text as content, author_id, email, login, blog.id as blog_id, blog_comment.text as comment
						FROM blog 
						LEFT JOIN blog_comment ON blog.id=blog_comment.blog_id
						LEFT JOIN user ON author_id = user.id ORDER BY blog_id";
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data;
	}
	public static function addComment($blog_id, $comment) {
		$conn = Db::getConnection();
		$user_id = $_SESSION['user_id'];
		$sql = "INSERT INTO shop.blog_comment (id, author_id, blog_id, text) 
		VALUES (NULL, '$user_id', '$blog_id', '$comment')";
		return $conn->query($sql);
	}
}
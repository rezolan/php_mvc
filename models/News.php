<?

class News {
	public static function getNewsItemById($id) {
		$id = intval($id);
		if($id) {
			$conn = Db::getConnection();
			$sql = "SELECT * FROM news where id=$id";
			$result = $conn->query($sql);
			$data = $result->fetch_all(MYSQLI_ASSOC);
			return $data[0];
		}
	}

	public static function getNewsList() {
		$conn = Db::getConnection();
		$sql = "SELECT * FROM news";
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data;
	}
}
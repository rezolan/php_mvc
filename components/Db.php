<?

class Db {
	public static function getConnection() {
		$paramsPath = ROOT . '/config/db_params.php';
		$params = include($paramsPath);
		$conn = new mysqli(
			$params['servername'],
			$params['username'],
			$params['password'],
			$params['dbname']);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
	}
}
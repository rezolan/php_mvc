<?php
class Product {
	public static function getProducts() {
			$conn = Db::getConnection();
			$sql = "SELECT img,product.name,brand,price,is_available,category.name AS category_name
			FROM product
			INNER JOIN category_product ON product.id = category_product.product_id
			INNER JOIN category ON category_product.category_id = category.id";
			$result = $conn->query($sql);
			$data = $result->fetch_all(MYSQLI_ASSOC);
			return $data;
	}
	public static function getProductsByCategoryId($id) {
		$id = intval($id);
		if($id) {
			$conn = Db::getConnection();
			$sql = "SELECT img,product.name,brand,price,is_available,category.name AS category_name
			FROM product
			INNER JOIN category_product ON product.id = category_product.product_id
			INNER JOIN category ON category_product.category_id = category.id
			WHERE category_product.category_id=$id LIMIT 0,20";
			$result = $conn->query($sql);
			$categories = $result->fetch_all(MYSQLI_ASSOC);
			return $categories;
		}
	}
	public static function getProductById($id) {
		$id = intval($id);
		if($id) {
			$conn = Db::getConnection();
			$sql = "SELECT * FROM product where id=$id";
			$result = $conn->query($sql);
			$data = $result->fetch_all(MYSQLI_ASSOC);
			return $data[0];
		}
	}
	public static function getCategories() {
		$conn = Db::getConnection();
		$sql = "SELECT * FROM category";
		$result = $conn->query($sql);
		$categories = $result->fetch_all(MYSQLI_ASSOC);
		return $categories;
	}
}
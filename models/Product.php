<?php
class Product {
	public static function getProducts($start, $countOnPage) {
		$conn = Db::getConnection();
		$sql = "SELECT id,img,product.name,brand,price,is_available
		FROM product
		ORDER BY id
		LIMIT $start,$countOnPage";
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data;
	}
	public static function getProductsByCategoryId($id, $start, $countOnPage) {
		$id = intval($id);
		if($id) {
			$conn = Db::getConnection();
			$sql = "SELECT product.id,img,product.name,brand,price,is_available,category.name AS category_name
			FROM product
			INNER JOIN category_product ON product.id = category_product.product_id
			INNER JOIN category ON category_product.category_id = category.id
			WHERE category_product.category_id=$id
			ORDER BY product.id
			LIMIT $start, $countOnPage";
			$result = $conn->query($sql);
			$data = $result->fetch_all(MYSQLI_ASSOC);
			return $data;
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
	public static function getSubCategories() {
  		$conn = Db::getConnection();
  		$sql = "SELECT category.id as id, category.name as name, subcategory.id as subId, subcategory.name as subName
  		  			FROM category
  		  			INNER JOIN subcategory
  		  			ON category.id = category_id";
  		$result = $conn->query($sql);
  		$subCategories = $result->fetch_all(MYSQLI_ASSOC);
  		$categoryTree = array();
  		forEach($subCategories as $subCategory) {
  			$categoryTree[$subCategory['id']][] = $subCategory;
  		}
  		return $categoryTree;
  	}
	public static function getProductCount() {
		$conn = Db::getConnection();
		$sql = "SELECT count(*) as count FROM product";
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data[0]['count'];
	}
	public static function getProductCountByCategory($id) {
		$id = intval($id);
		if($id) {
			$conn = Db::getConnection();
			$sql = "SELECT count(*) as count FROM product
			INNER JOIN category_product ON product.id = category_product.product_id
			WHERE category_product.category_id=$id";
			$result = $conn->query($sql);
			$data = $result->fetch_all(MYSQLI_ASSOC);
			return $data[0]['count'];
		}
	}
}
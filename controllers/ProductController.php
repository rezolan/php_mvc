<?
class ProductController {
	public function actionIndex($id) {
		$id = intval($id[0]);
		include ROOT.'/models/Product.php';
		if($id) {
			$products = Product::getProductsByCategoryId($id);
		} else {
			$products = Product::getProducts();
		}
		$categories = Product::getCategories();
		include ROOT.'/views/ProductView.php';
	}
	public function actionProduct($id) {
		$id = intval($id[0]);
		include ROOT.'/models/Product.php';
		if($id) {
			$products = Product::getProductById($id);
		}
		$categories = Product::getCategories();
		include ROOT.'/views/ProductItemView.php';
	}
}
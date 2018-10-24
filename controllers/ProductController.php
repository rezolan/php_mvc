<?
class ProductController {
	public function actionIndex($params) {
		echo '<pre>';
		var_dump($params);
		echo '</pre>';
		$id = intval($params[0]);
		$subId = intval($params[1]);
	 	$pageNumber = intval($params[2]);
	 	if(!$pageNumber){
	 		$pageNumber = 1;
	 	}
		$countOnPage = 21;
		$productItemsCount = ($pageNumber-1)*$countOnPage;
		// include ROOT.'/models/Product.php';
		if($id) {
			$products = Product::getProductsByCategoryId($id, $productItemsCount, $countOnPage);
			$productCount = Product::getProductCountByCategory($id);
			$paginationPath = "/$id/page-";
		} else {
			$products = Product::getProducts($productItemsCount, $countOnPage);
			$productCount = Product::getProductCount();
			$paginationPath = "/page-";
		}
		$productCount = intval($productCount);
		$categories = Product::getCategories();
		$subCategories = Product::getSubCategories();
		include ROOT.'/views/ProductView.php';
		
		// include ROOT.'/components/Pagination.php';
		$pagination = new Pagination($productCount, $countOnPage, $pageNumber, $paginationPath);
		echo $pagination->show();
	}
	public function actionProduct($params) {
		$id = $params[0];
		$pageNumber = $params[1];
		$id = intval($id);
		// include ROOT.'/models/Product.php';
		if($id) {
			$products = Product::getProductById($id);
		}
		include ROOT.'/views/ProductItemView.php';
	}
}
<?
class NewsController {
	public function actionIndex() {
		include ROOT . '/views/news/newsView.php';
	}
	public function actionList($params) {
		include ROOT . '/models/News.php';
		if($params[0]) {
			$data = News::getNewsItemById($params[0]);
			include ROOT . '/views/news/newsListItem.php';
		} else {
			$data = News::getNewsList();
			include ROOT . '/views/news/newsList.php';
		}
	}
	public function actionSingle() {
		echo 'actionSingle';
	}
}
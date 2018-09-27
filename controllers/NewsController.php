<?
class NewsController {
	public function actionIndex() {
		include 'views/news/newsView.php';
	}
	public function actionList($params) {
		include 'models/News.php';
		if($params[0]) {
			$data = News::getNewsItemById($params[0]);
				include 'views/news/newsListItem.php';
		} else {
			$data = News::getNewsList();
			include 'views/news/newsList.php';
		}
	}
	public function actionSingle() {
		echo 'actionSingle';
	}
}
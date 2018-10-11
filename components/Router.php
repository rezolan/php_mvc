<?
class Router {
	private $routes;
	public function __construct() {
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
		session_start();
	}
	private function getUri() {
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI']);
		}
	}
	public function run() {
		$uri = $this->getUri();
		include ROOT.'/views/layouts/header.php';
		echo '<main>';
		foreach($this->routes as $uriPattern => $path){
			if (preg_match("~$uriPattern~", $uri)){
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri); // 'news/list/12'
				$segments = explode('/', $internalRoute); // [news, list, 12]
				$controllerName = array_shift($segments) . 'Controller'; // news . Controller [list, 12]
				$controllerName = ucfirst($controllerName); // NewsController
				$actionName = 'action' . ucfirst(array_shift($segments)); //action . List [12]
				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
				// if (file_exists($controllerFile)) {
					// include_once($controllerFile);
				// }
				$controllerObject = new $controllerName;
				$result = $controllerObject->$actionName($segments);
				break;
			}
		}

		echo '</main>';
		include ROOT.'/views/layouts/footer.php';
	}
}
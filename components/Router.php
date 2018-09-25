<?

class Router {
	private $routes;
	public function __construct() {
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
	}
	private function getUri() {
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI']);
		}
	}
	public function run() {
		$uri = $this->getUri();

		$uris = explode('/', $uri);
		$routeKey = $uris[1];
		for($i = 2; $i < count($uris); $i++) {
			if($uris[$i]) {
				$routeKey = $routeKey . "/" . $uris[$i];
			}
		}

		$path = $this->routes[$routeKey];
		if($path) {
			$segments = explode('/', $path); //['news', 'list']
			$controllerName = array_shift($segments) . 'Controller'; //newsController
			$controllerName = ucfirst($controllerName); //NewsController

			$actionName = 'action' . ucfirst(array_shift($segments)); //actionList

			$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

			if (file_exists($controllerFile)) {
				include_once($controllerFile);
			}

			$controllerObject = new $controllerName; //new NewsController
			$result = $controllerObject->$actionName(); //$controllerObject->actionList();
		} else {
			echo 404;
		}
	}
}
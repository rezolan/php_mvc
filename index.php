<?

define('ROOT', dirname(__FILE__));
include ROOT. '/components/autoload.php';
// require_once(ROOT . '/components/Router.php');
// require_once(ROOT . '/components/Db.php');

$router = new Router();
$router->run();
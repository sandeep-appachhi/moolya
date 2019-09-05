<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Logger\Adapter\File as FileAdapter;

// Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');


$config = include __DIR__."/../app/config/config.php";


// Register an autoloader
$loader = new Loader();

$loader->registerDirs(
	[
		APP_PATH . '/controllers/',
		APP_PATH . '/models/',
	]
);


$loader->register();

// Create a DI
$di = new FactoryDefault();

// // Setup the view component
$di->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        	$view->registerEngines(array(
		'.volt' => function ($view, $di) use ($config) {

			$volt = new VoltEngine($view, $di);
			$volt->setOptions(array(
				'compiledPath' => $config->application->cacheDir,
				'compiledSeparator' => '_',
				'stat' => true,
				'compileAlways' => true
			));

			$volt->getCompiler()->addFunction('explode', 'explode');
			$volt->getCompiler()->addFunction('implode', 'implode');
			$volt->getCompiler()->addFunction('ucwords', 'ucwords');
			$volt->getCompiler()->addFunction('ceil', 'ceil');
			$volt->getCompiler()->addFunction('inarray', 'inarray');
			$volt->getCompiler()->addFunction('in_array', 'in_array');
			$volt->getCompiler()->addFunction('count', 'count');
			$volt->getCompiler()->addFunction('print_r', 'print_r');
			$volt->getCompiler()->addFunction('min', 'min');
			$volt->getCompiler()->addFunction('max', 'max');
			$volt->getCompiler()->addFunction('strpos', 'strpos');
			$volt->getCompiler()->addFunction('str_replace', 'str_replace');
			$volt->getCompiler()->addFunction('array_merge', 'array_merge');
			$volt->getCompiler()->addFunction('array_unique', 'array_unique');
			$volt->getCompiler()->addFunction('htmlspecialchars_decode', 'htmlspecialchars_decode');
			$volt->getCompiler()->addFunction('htmlspecialchars', 'htmlspecialchars');
			$volt->getCompiler()->addFunction('isset', 'isset');
			$volt->getCompiler()->addFunction('array_search', 'array_search');
			$volt->getCompiler()->addFunction('strrpos', 'strrpos');
			$volt->getCompiler()->addFunction('strtolower', 'strtolower');
			$volt->getCompiler()->addFunction('round', 'round');
			$volt->getCompiler()->addFunction('substr', 'substr');
			$volt->getCompiler()->addFunction('file_exists', 'file_exists');
			$volt->getCompiler()->addFunction('urlencode', 'urlencode');
			$volt->getCompiler()->addFunction('json_decode', 'json_decode');
			$volt->getCompiler()->addFunction('json_encode', 'json_encode');
			$volt->getCompiler()->addFunction('strip_tags', 'strip_tags');
			$volt->getCompiler()->addFunction('rand', 'rand');
			$volt->getCompiler()->addFunction('trim', 'trim');
			$volt->getCompiler()->addFunction('htmlentities', 'htmlentities');
			$volt->getCompiler()->addFunction('round', 'round');
			$volt->getCompiler()->addFunction('range', 'range');
			$volt->getCompiler()->addFunction('parse_url', 'parse_url');
			$volt->getCompiler()->addFunction('preg_replace', 'preg_replace');
			$volt->getCompiler()->addFunction('date', 'date');
			$volt->getCompiler()->addFunction('substr', 'substr');
			$volt->getCompiler()->addFunction('strtotime', 'strtotime');

			return $volt;
		},
		'.phtml' => 'Phalcon\Mvc\View\Engine\Php'
	));
        return $view;
    }
);
$di->set('config', $config);

include __DIR__."/../app/config/services.php";
// Setup a base URI so that all generated URIs include the "tutorial" folder
$di->set(
	'url',
	function () {
		$url = new UrlProvider();
		$url->setBaseUri('/');
		return $url;
	}
);


$di->set('db', function () use ($config) {
	return new DbAdapter(array(
		'host' => $config->database->host,
		'username' => $config->database->username,
		'password' => $config->database->password,
		'dbname'   => $config->database->dbname,
		'options'  => [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
	));
});




// Setup the model service
$di->set(
	"modelsManager",
	function() {
		return new ModelsManager();
	}
);

$di->set('logger', function() use ( $config ) {
	$domain = $config->application->domain;
	switch ( $domain ) {
		case 'moolya.com':
			return new FileAdapter( '/var/log/appachhi-live/moolya.'.date('Y-m-d').'.log', array('mode' => 'a+'));
			break;
		case 'localhost':
		default:
			return new FileAdapter( '/var/log/appachhi-local/moolya.'.date('Y-m-d').'.log', array('mode' => 'a+'));
			break;
	}
});

$application = new Application($di);
try {
	// Handle the request
	$response = $application->handle();

	$response->send();
} catch (\Exception $e) {
	echo 'Exception: ', $e->getMessage();
}


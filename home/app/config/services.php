<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt ;
use \Phalcon\Mvc\Dispatcher as PhDispatcher;

// // Register Volt as a service

// Register Volt as template engine
$di->set(
    'view',
    function () {
        $view = new View();

        $view->setViewsDir( APP_PATH .'/views/');
        $view->registerEngines(
            [
                '.volt' => 'voltService',
                '.phtml' => 'voltService',
            ]
        );

        return $view;
    }
);
$di->set(
    'voltService',
    function ($view, $di) {
        $volt = new Volt($view, $di);

        $volt->setOptions(
            [
                'compiledPath'      => APP_PATH . '/cache/',
                'compiledSeparator' => '_',
                'stat' => true,
                'compileAlways' => true
            ]
        );

        return $volt;
    }
);

$di->set(
    'dispatcher',
    function() use ($di) {

        $evManager = $di->getShared('eventsManager');

        $evManager->attach(
            "dispatch:beforeException",
            function($event, $dispatcher, $exception)
            {
                switch ($exception->getCode()) {
                    case PhDispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                    case PhDispatcher::EXCEPTION_ACTION_NOT_FOUND:
                        $dispatcher->forward(
                            array(
                                'controller' => 'error',
                                'action'     => 'index',
                            )
                        );
                        return false;
                }
            }
        );
        $dispatcher = new PhDispatcher();
        $dispatcher->setEventsManager($evManager);
        return $dispatcher;
    },
    true
);

/*************************************************************************/
/*  Routing Service                                                      */
/*************************************************************************/
$di->set('router', function () {
    return require __DIR__ . '/router.php';
});
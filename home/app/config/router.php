<?php

$router = new Phalcon\Mvc\Router(false);

$router->removeExtraSlashes(true);

//Define your routes here
// Home Page
$router->add('/', array(
    'controller' => 'index',
    'action'     => 'index'
));


$router->handle();

return $router;
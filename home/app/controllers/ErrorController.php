<?php

use Phalcon\Mvc\Controller;

class ErrorController extends Controller
{
	public function indexAction()
    {
    	
        $this->response->setStatusCode(404, 'Not Found');
        $this->view->pick('error/error');
    }
}
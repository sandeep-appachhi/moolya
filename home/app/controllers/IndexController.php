<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class IndexController extends Controller
{
    public function initialize() {
		$this->logger->log('[Account]initialize(): START');
		$this->tag->setTitle('Moolya Software Testing - Cross culture testing services');
		$this->logger->log('[Account]initialize(): END');
		return;
	}

    public function indexAction()
    {
		
		$this->logger->log('[indexActionController]indexAction() START');
		$this->view->pick('home/dashboard');
		$this->logger->log('[indexActionController]indexAction() END');
		return;
    }
}

<?php
namespace Prokrastinat\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends BaseController
{
	public function indexAction()
	{
		return new ViewModel();
	}
}

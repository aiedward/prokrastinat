<?php
namespace Datoteke\Controller;

use Zend\Mvc\Controller\AbstractActionController;

abstract class BaseController extends AbstractActionController
{
	private $em;

	public function getEntityManager()
	{
		if ($this->em === null) {
			$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}
		return $this->em;
	}
}

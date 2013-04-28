<?php
namespace Prokrastinat\Controller;

use Zend\Mvc\Controller\AbstractActionController;

abstract class BaseController extends AbstractActionController
{
    private $entity_manager;
    private $auth_service;

    public function getEntityManager()
    {
        if ($this->entity_manager === null) {
            $this->entity_manager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->entity_manager;
    }

    public function getAuthService()
    {
        if ($this->auth_service === null) {
            $this->auth_service = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        }
        return $this->auth_service;
    }
}

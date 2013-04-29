<?php
namespace Prokrastinat\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\EventManager\EventManagerInterface;

abstract class BaseController extends AbstractActionController
{
    protected $request;
    protected $auth;
    protected $em;

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);

        $this->request = $this->getRequest();
        $this->auth = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function zahtevajLogin()
    {
        if (!$this->auth->hasIdentity()) {
            // to-do: zapomni si zadnji request in po uspešni prijavi redirectaj nazaj
            return $this->redirect()->toRoute('user', array('action' => 'login'));
        }
    }
}

<?php
namespace Prokrastinat\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ViewModel;

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
        echo "zamenjaj $this->getEntityManager z $this->em";
        return $this->em;
    }

    public function dostopZavrnjen()
    {
        if (!$this->auth->hasIdentity()) {
            // to-do: zapomni si zadnji request in po uspešni prijavi redirectaj nazaj
            return $this->redirect()->toRoute('user', array('action' => 'login'));
        } else {
            $this->getResponse()->setStatusCode(403);
            $model = new ViewModel();
            return $model->setTemplate('error/403');
        }
    }

    public function imaPravico($permission, $owner = null)
    {
        if ($this->auth->getIdentity() === null)
            return $this->isGranted($permission);
        else 
            return $this->isGranted($permission) || $this->auth->getIdentity() === $owner;
    }

    public function jeAvtor($user)
    {
        echo "zamenjaj isGranted(permission) || jeAvtor(owner) z imaPravico(permission, owner)";
        return $this->auth->getIdentity() === $user;
    }
}

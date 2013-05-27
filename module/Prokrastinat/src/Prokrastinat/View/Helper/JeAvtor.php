<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class JeAvtor extends AbstractHelper implements ServiceLocatorAwareInterface {
    protected $serviceLocator;
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    public function getServiceLocator() {
        return $this->serviceLocator;
    }
    
    public function __invoke ($user) {
        $auth = $this->getServiceLocator()->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        return $auth->getIdentity() === $user;
    }
}

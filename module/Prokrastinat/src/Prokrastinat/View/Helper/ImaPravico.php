<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class ImaPravico extends AbstractHelper implements ServiceLocatorAwareInterface {
    protected $serviceLocator;
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    public function getServiceLocator() {
        return $this->serviceLocator;
    }
    
    public function __invoke ($permission, $owner = null) {
        $auth = $this->getServiceLocator()->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        $rbac = $this->getServiceLocator()->getServiceLocator()->get('ZfcRbac\Service\Rbac');

        if ($auth->getIdentity() === null)
            return $rbac->isGranted($permission);
        else 
            return $rbac->isGranted($permission) || $auth->getIdentity() === $owner;
    }
}

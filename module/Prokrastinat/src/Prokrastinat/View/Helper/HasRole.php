<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class HasRole extends AbstractHelper implements ServiceLocatorAwareInterface {
    protected $serviceLocator;
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    public function getServiceLocator() {
        return $this->serviceLocator;
    }
    
    public function __invoke ($role_access) {
        $auth = $this->getServiceLocator()->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        
        $url = $this->getView()->plugin('url');
        $escape = $this->getView()->plugin('escapeHtml');
        $translate = $this->getView()->plugin('translate');
        
        if ($auth->hasIdentity()) {
            $user = $auth->getIdentity();
            foreach ($user->roles as $role) {var_dump($role->name); die;
                $first = $role->id;
                
                do {
                    if ($role->name === $role_access)
                        return true;
                    $role = $role->parent_role;
                } while (!is_null($role) && $role->id !== $first);
            }
            return false;
        }
    }
}

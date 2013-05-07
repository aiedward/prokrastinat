<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class LoginHelper extends AbstractHelper implements ServiceLocatorAwareInterface {
    protected $serviceLocator;
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    public function getServiceLocator() {
        return $this->serviceLocator;
    }
    
    public function __invoke () {
        //$auth = $this->getServiceLocator()->get('AuthService');
        $auth = $this->getServiceLocator()->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        
        $url = $this->getView()->plugin('url');
        $escape = $this->getView()->plugin('escapeHtml');
        $translate = $this->getView()->plugin('translate');
        
        if ($auth->hasIdentity()) {
            $user = $auth->getIdentity();
            $ime = $user->getPolnoIme();
            
            $menu = '<ul class="dropdown-menu">'
                . '<li><a href="' . $url('view', array('id' => $user->id )) . '">Profil</a></li>'
                . '<li><a href="' . $url('user', array('action' => 'edit')) . '">Uredi podatke</a></li>'
                . '<li><a href="' . $url('user', array('action' => 'logout')) . '">Izpis</a></li>'
                . '</ul>';
            $button = '<div class="btn-group pull-right"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'
                . $escape($ime) . ' <span class="caret"></span></a>' . $menu . '</div>';
                
            return $button;
        } else {
            return '<p class="navbar-text pull-right">'
                . '<a href="' . $url('user', array('action' => 'login', 'id' => 100)) . '">'
                . $translate('Vpis') . '</a></p>';
        }
    }
}

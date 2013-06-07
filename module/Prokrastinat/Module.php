<?php
namespace Prokrastinat;

use Prokrastinat\View\Helper\JeAvtor;
use Prokrastinat\View\Helper\ImaPravico;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getViewHelperConfig()   {
        return array(
            'factories' => array(
                'jeAvtor' => function($sm) {
                    return new JeAvtor($sm);
                },
                'imaPravico' => function($sm) {
                    return new ImaPravico($sm);
                },
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Prokrastinat\Authentication\AuthenticationService' => function($serviceManager) {
                    return $serviceManager->get('doctrine.authenticationservice.orm_default');
                }
            )
        );
    }
}

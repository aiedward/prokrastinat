<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class SidebarHelper extends AbstractHelper implements ServiceLocatorAwareInterface {
    protected $serviceLocator;
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    public function getServiceLocator() {
        return $this->serviceLocator;
    }
   
    
    public function __invoke () {
        /*$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $query = $em->createQuery("SELECT n FROM Novice\Entity\Novica n");
        $query->setMaxResults(1);
        $novice = $query->getResult();*/
        
        return 'SIDEBAR TEST';
    }
}

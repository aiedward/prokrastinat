<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;


class SidebarHelper extends AbstractHelper implements ServiceLocatorAwareInterface {
    protected $serviceLocator;
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    public function getServiceLocator() {
        return $this->serviceLocator;
    }
   
    
    public function __invoke () {      
        $em = $this->getServiceLocator()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $qb = new \Doctrine\ORM\QueryBuilder($em);
        $q = $qb->select('n')
            ->from('\Novice\Entity\Novica', 'n')
            ->orderBy('n.datum_objave', 'DESC')
            ->setMaxResults(1);
        
        $novice = $q->getResult();
        
        foreach($novice as $novica)
        {
            echo $novica->naslov;
        }
        
        return 'SIDEBAR TEST';
    }
}

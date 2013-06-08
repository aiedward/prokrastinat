<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Novice\Entity\Novica;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;


class SidebarHelper extends AbstractHelper implements ServiceLocatorAwareInterface 
{
    protected $serviceLocator;
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) 
    {
        $this->serviceLocator = $serviceLocator;
    }
    public function getServiceLocator() 
    {
        return $this->serviceLocator;
    }
   
    
    public function __invoke () 
    {      
        $em = $this->getServiceLocator()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $novicaRep = $em->getRepository('Novice\Entity\Novica');
        $novica = $novicaRep->getLastNovice(3);
        $koncni ='<div style="text-align: center;"><b>Zadnje novice</b></div>';
        foreach($novica as $nov)
        {
            $koncni = $koncni."<div class='sidebar-novica'><b><a href='/novice/pregled/".$nov->id."'>".$nov->naslov."</a></b><br>".$nov->vsebina."</div>";      
        }
        
        
        $oglas_repo = $em->getRepository('Deska\Entity\Oglas');
        $oglasi = $oglas_repo->getLastOglasi();
        $koncni = $koncni.'<hr/><div style="text-align: center;"><b>Zadnji oglasi</b></div>';
        
        foreach ($oglasi as $oglas) {
            $koncni = $koncni."<div class='sidebar-novica'><b><a href='/deska/preglej/".$oglas->id."'>".$oglas->naslov."</a></b><br>".$oglas->vsebina."</div>";      
        }
        
        return $koncni;
    }
}

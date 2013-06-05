<?php

namespace Prokrastinat\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Novice\Entity\Novica;

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
        $novicaRep = $em->getRepository('Novice\Entity\Novica');
        
        $novica = $novicaRep->getLastNovice(3);
        foreach($novica as $nov)
        {
            ?>
            <div class="sidebar-novica">
                <b><a href=""><?php echo $nov->naslov;?></a></b>
                <br>
                <?php echo $nov->vsebina;?>
            </div>
        <?php
        }
    }
}

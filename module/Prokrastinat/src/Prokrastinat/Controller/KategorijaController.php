<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class KategorijaController extends BaseController
{
    /** @var Prokrastinat\Repository\KategorijaRepository */
    protected $kategorijaRepository;

    /** @var Prokrastinat\Repository\PredmetRepository */
    protected $predmetRepository;

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);

        $this->kategorijaRepository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $this->predmetRepository = $this->getServiceLocator()->get('doctrine.entitymanager.orm_aips')->getRepository('Prokrastinat\EntityAips\Predmet');
    }
    
    public function updateAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $zavodi = $config['aips']['zavodi'];
        $predmeti = $this->predmetRepository->findByZavodi($zavodi);
        $this->kategorijaRepository->update($predmeti);
        $this->em->flush();
        return new ViewModel();
    }
}

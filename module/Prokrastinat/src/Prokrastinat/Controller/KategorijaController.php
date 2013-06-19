<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
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

    public function serializeAction()
    {
        $query = $this->getRequest()->getQuery('query');
        $kategorije = $this->kategorijaRepository->search($query);

        $kategorije_list = array();
        foreach ($kategorije as $kategorija) {
            array_push($kategorije_list, $kategorija->ime);
        }

        return new JsonModel(array(
            'options' => $kategorije_list
        ));
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

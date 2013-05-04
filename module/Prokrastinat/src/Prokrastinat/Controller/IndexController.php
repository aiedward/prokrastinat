<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;
use Deska\Entity\Oglas;

class IndexController extends BaseController
{
    public function indexAction() 
    {
        $query = $this->getEntityManager()->createQuery("SELECT o FROM Deska\Entity\Oglas o");
        $oglasi = $query->getResult();

        return new ViewModel(array(
                'oglasi' => $oglasi,
            ));
    }
}

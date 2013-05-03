<?php
namespace Vprasanja\Controller;

use Zend\View\Model\ViewModel;
use Prokrastinat\Controller\BaseController;

class OdgovorController extends BaseController
{
    public function indexAction()
    {
        // anchor na odgovor v vprasanju
    }

    public function dodajAction()
    {
        $this->zahtevajLogin();

        if ($this->request->isPost()) {
            $form = new \Vprasanja\Form\Odgovor();
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $id = $form->get('vprasanje_id')->getValue();
                $vprasanje = $this->em->find('Vprasanja\Entity\Vprasanje', $id);

                $odgovor = new \Vprasanja\Entity\Odgovor();

                $odgovor->user = $this->auth->getIdentity();
                $odgovor->objava = $vprasanje;
                $odgovor->vsebina = $form->get('vsebina')->getValue();
                $odgovor->datum_objave = new \DateTime("now");

                $this->em->persist($odgovor);
                $this->em->flush();

                $url = $this->url()->fromRoute('preglej', array('id' => $vprasanje->id));
                return $this->redirect()->toUrl($url . "#{$odgovor->id}");
            }
        }
    }

    public function urediAction()
    {

    }

    public function brisiAction()
    {

    }
}

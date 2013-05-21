<?php
namespace Vprasanja\Controller;

use Zend\View\Model\ViewModel;

use Prokrastinat\Controller\BaseController;
use Vprasanja\Entity\Odgovor;
use Vprasanja\Form\OdgovorForm;

class OdgovorController extends BaseController
{
    public function indexAction()
    {
        // anchor na odgovor v vprasanju
    }

    public function dodajAction()
    {
        if (!$this->isGranted('odgovor_dodaj')) {
            return $this->dostopZavrnjen();
        }

        if ($this->request->isPost()) {
            $form = new OdgovorForm();
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $id = $form->get('vprasanje_id')->getValue();
                $vprasanje = $this->em->find('Vprasanja\Entity\Vprasanje', $id);

                $odgovor = new Odgovor();
                $odgovor->user = $this->auth->getIdentity();
                $odgovor->objava = $vprasanje;
                $odgovor->vsebina = $form->get('vsebina')->getValue();
                $odgovor->datum_objave = new \DateTime("now");

                $this->em->persist($odgovor);
                $this->em->flush();

                $url = $this->url()->fromRoute('preglej', array('id' => $vprasanje->id));
                return $this->redirect()->toUrl($url . $odgovor->id);
            }

            // to-do: form invalid
        }

        // to-do: is not post
    }

    public function urediAction()
    {

    }

    public function brisiAction()
    {

    }
}

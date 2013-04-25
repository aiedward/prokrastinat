<?php
namespace Vprasanja\Controller;

use Zend\View\Model\ViewModel,
Prokrastinat\Controller\BaseController;

class VprasanjeController extends BaseController
{
	public function indexAction()
	{
		return new ViewModel();
	}

	public function dodajAction()
	{
		$form = new \Vprasanja\Form\Vprasanje();
		$request = $this->getRequest();

		if ($request->isPost()) {
			$form->setData($request->getPost());
			$naslov  = $request->getPost('naslov');
			$vsebina = $request->getPost('vsebina');

			if ($form->isValid()) {
				$vprasanje = new \Vprasanja\Entity\Vprasanje();
				$vprasanje->setNaslov($naslov);
				$vprasanje->setVsebina($vsebina);
				$vprasanje->setDatumObjave(new \DateTime("now"));

				$this->getEntityManager()->persist($vprasanje);
				$this->getEntityManager()->flush();

				// success
			}

			// BAD
		}

		// ni blo POST

		return new ViewModel(array(
			'form' => $form
		));
	}

	public function urediAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	}

	public function brisiAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	}
}

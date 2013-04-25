<?php
namespace Prokrastinat\Controller;
use Zend\View\Model\ViewModel;

class UserController extends BaseController
{
	public function indexAction()
	{
		return new ViewModel();
	}

	public function loginAction()
	{
		$form = new \Prokrastinat\Form\Login();
		if ($this->getRequest()->isPost()) {
			$data = $this->getRequest()->getPost();
			
			$form->setInputFilter($form->getInputFilter());
			$form->setData($data);
			
			if ($form->isValid()) {
				$authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
				$adapter = $authService->getAdapter();
				$adapter->setIdentityValue($form->get('username')->getValue());
				$adapter->setCredentialValue($form->get('password')->getValue());
				$result = $authService->authenticate();

				if ($result->isValid()) {
					return $this->redirect()->toRoute('index');
				} else {
					$form->get('password')->setMessages(array(
						'Kombinacija uporabniškega imena in gesla je napačna'
					));
				}
			}
		}

		return new ViewModel (array(
			'form' => $form,
			'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
		));
	}

	public function editAction()
	{
		$form = new \Prokrastinat\Form\Edit();

		return new ViewModel (array(
			'form' => $form,
			'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL));
	}
}

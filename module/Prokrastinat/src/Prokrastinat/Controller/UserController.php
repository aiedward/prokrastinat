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
		
		if ($data = $this->getRequest()->getPost()) {
			$form->setData($data);
			if ($form->isValid()) {
				$authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
				
				$adapter = $authService->getAdapter();
				$adapter->setIdentityValue($form->getValue('username'));
				$adapter->setCredentialValue($form->getValue('password'));
				$result = $authService->authenticate();
				
				if ($result->isValid()) {
					return $this->redirect()->toRoute('index');
				}
			}
		}
		
		return new ViewModel (array(
			'form' => $form,
			'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL));
	}
        
        public function editAction()
        {
            $form = new \Prokrastinat\Form\Edit();
            
            return new ViewModel (array(
                        'form' => $form,
                        'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL));
        }
}

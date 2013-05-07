<?php
namespace Prokrastinat\Controller;
use Zend\View\Model\ViewModel;

class UserController extends BaseController
{
        /** @var Prokrastinat\Repository\UserRepository */
        protected $userRepository;
    
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
	
	public function logoutAction()
	{
		$authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
		$authService->clearIdentity();
		
		return $this->redirect()->toRoute('index');
	}
	
	public function editAction()
	{
		$form = new \Prokrastinat\Form\Edit();

		return new ViewModel (array(
			'form' => $form,
			'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL));
	}
        
        public function viewAction()
        {
            $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $this->userRepository = $this->getEntityManager()->getRepository('Prokrastinat\Entity\User');
            $user = is_numeric($id) ? $this->userRepository->find($id) : null;
            
            if($user == null)
                throw new \Exception('Uporabnik ne obstaja');
            
            return new ViewModel(array('user' => $user));
        }
}

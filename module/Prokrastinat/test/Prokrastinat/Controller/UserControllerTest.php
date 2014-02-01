<?php

namespace Prokrastinat\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class UserControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../../../../config/application.config.php'
        );
        parent::setUp();
    }

    public function testLoginAction()
    {
        $this->dispatch('/user/login');
        $this->assertResponseStatusCode(200);
    }
}

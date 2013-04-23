<?php
namespace Datoteke;

use Datoteke\Model\Datoteke;
use Datoteke\Model\DatotekeTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Datoteke\Model\DatotekeTable' =>  function($sm) {
                    $tableGateway = $sm->get('DatotekeTableGateway');
                    $table = new DatotekeTable($tableGateway);
                    return $table;
                },
                'DatotekeTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Datoteke());
                    return new TableGateway('datoteka', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}

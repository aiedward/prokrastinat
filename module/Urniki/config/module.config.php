<?php
namespace Urniki;

use DoctrineORMModule;
return array(
    'controllers' => array(
        'invokables' => array(
            'Urniki\Controller\Urniki' => 'Urniki\Controller\UrnikiController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'urniki' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'urniki' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/urniki[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Urniki\Controller\Urniki',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'configuration' => array(
            'orm_urniki' => array(
                'metadata_cache'    => 'array',
                'query_cache'       => 'array',
                'result_cache'      => 'array',
                'driver'            => 'orm_urniki',
                'generate_proxies'  => true,
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'   => 'DoctrineORMModule\Proxy',
                'filters'           => array()
            )
        ),
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_urniki' => array(
                //'class' => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        ),
        // urniki entity manager
        'entitymanager' => array(
            /*'orm_default' => array(
                'connection'    => 'orm_default',
                'configuration' => 'orm_default',
            ),*/
            'orm_urniki' => array(
                'connection'    => 'orm_urniki',
 
                // configuration instance to use. The retrieved service name will
                // be `doctrine.configuration.$thisSetting`
                'configuration' => 'orm_urniki'
            )
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'doctrine.entitymanager.orm_urniki' => new DoctrineORMModule\Service\EntityManagerFactory('orm_urniki'),
            'doctrine.connection.orm_urniki' => new DoctrineORMModule\Service\DBALConnectionFactory('orm_urniki'),
            'doctrine.configuration.orm_urniki' => new DoctrineORMModule\Service\ConfigurationFactory('orm_urniki'),
        )
    )
);

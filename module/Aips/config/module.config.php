<?php
namespace Aips;

return array(
    'controllers' => array(
        'invokables' => array(
            'Aips\Controller\Aips' => 'Aips\Controller\AipsController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'aips' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'aips' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/profesorji[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Aips\Controller\Aips',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            )
        )
    ),
);

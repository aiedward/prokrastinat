<?php
namespace Vprasanja;
return array(
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
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Vprasanje' => 'Vprasanja\Controller\VprasanjeController',
            'Odgovor' => 'Vprasanja\Controller\OdgovorController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'vprasanje' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/vprasanje[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9]*',
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Vprasanje',
                        'action' => 'index'
                    ),
                ),
            ),

            'odgovor' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/vprasanje/:ido[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9]*',
                        'ido'    => '[0-9]+',
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Odgovor',
                        'action' => 'index'
                    ),
                ),
            ),

            'preglej' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/vprasanje/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Vprasanje',
                        'action' => 'pregled'
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'odgovor/pregled'         => __DIR__ . '/../view/vprasanja/odgovor/pregled.phtml',  
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);
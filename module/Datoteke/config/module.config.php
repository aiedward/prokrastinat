<?php
namespace Datoteke;
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
            'Datoteke' => 'Datoteke\Controller\DatotekaController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'datoteke' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/datoteke/',
                    'defaults' => array(
                        'controller' => 'Datoteke',
                        'action'     => 'index',
                    ),
                ),
            ),
            'datoteke_dodaj' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/datoteke/dodaj/',
                    'defaults' => array(
                        'controller' => 'Datoteke',
                        'action' => 'dodaj'
                    ),
                ),
            ),
            'datoteke_moje' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/datoteke/moje/',
                    'defaults' => array(
                        'controller' => 'Datoteke',
                        'action' => 'moje'
                    ),
                ),
            ),
            'datoteke_pregled' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/datoteke/pregled/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Datoteke',
                        'action' => 'pregled'
                    ),
                ),
            ),
            'datoteke_uredi' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/datoteke/uredi/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Datoteke',
                        'action' => 'uredi'
                    ),
                ),
            ),
            'datoteke_download' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/datoteke/download/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Datoteke',
                        'action' => 'download'
                    ),
                ),
            ),
            'datoteke_brisi' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/datoteke/brisi/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Datoteke',
                        'action' => 'brisi'
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
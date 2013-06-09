<?php
namespace Novice;
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
            'Novica' => 'Novice\Controller\NovicaController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'novice' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'index'
                    ),
                ),
            ),
            'novice_index' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/index/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'index'
                    ),
                ),
            ),
            'novice_dodaj' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/dodaj/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'dodaj'
                    ),
                ),
            ),
            'novice_parse' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/parse/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'parse'
                    ),
                ),
            ),
            'novice_view' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/pregled/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'pregled'
                    ),
                ),
            ),
            'novice_uredi' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/uredi/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'uredi'
                    ),
                ),
            ),
            'novice_ostale' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/ostale/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'ostale'
                    ),
                ),
            ),
            'novice_studentske' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/ostale/studentske/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'studentske'
                    ),
                ),
            ),
            'novice_brisi' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/brisi/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'brisi'
                    ),
                ),
            ),
            'novice_pregled' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/pregled/:id',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'pregled'
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);
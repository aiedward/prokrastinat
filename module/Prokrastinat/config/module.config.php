<?php
namespace Prokrastinat;
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
            ),
            __NAMESPACE__ . '_driver_aips' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/EntityAips')
            ),
            'orm_aips' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    __NAMESPACE__ . '\EntityAips' => __NAMESPACE__ . '_driver_aips'
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Prokrastinat\Controller\Index' => 'Prokrastinat\Controller\IndexController',
            'Prokrastinat\Controller\User' => 'Prokrastinat\Controller\UserController',
            'Prokrastinat\Controller\Kategorija' => 'Prokrastinat\Controller\KategorijaController',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'login_box' => 'Prokrastinat\View\Helper\LoginHelper',
            'hasRole' => 'Prokrastinat\View\Helper\HasRole',
            'sidebar' =>'Prokrastinat\View\Helper\SidebarHelper',
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'kategorije_update' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/kategorije/update',
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\Kategorija',
                        'action' => 'update',
                    ),
                ),
            ),
            'map' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/map[/:room]',
                    'constraints' => array(
                        'room' => '[a-zA-Z][a-zA-Z0-9]*[\-]?[a-zA-Z0-9]*[\-]?[a-zA-Z0-9]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\Index',
                        'action' => 'map',
                    ),
                ),
            ),
            'get-ucilnice' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/map[/:room]/get-ucilnice/:mapa',
                    'constraints' => array(
                        'room' => '[a-zA-Z][a-zA-Z0-9]*[\-]?[a-zA-Z0-9]*[\-]?[a-zA-Z0-9]*',
                        'mapa' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\Index',
                        'action' => 'getUcilnice'
                    )
                )
            ),
            'user' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/user[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\User',
                        'action' => 'list',
                    ),
                ),
            ),
            'iskanje' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/iskanje[/]',
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\Index',
                        'action' => 'iskanje',
                    ),
                ),
            ),
            'user_view' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/user/view/:id',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\User',
                        'action' => 'view',
                    ),
                ),
            ),
            'user_list' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/user/list',
                    'defaults' => array(
                        'controller' => 'Prokrastinat\Controller\User',
                        'action' => 'list',
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
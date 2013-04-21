<?php
namespace Deska;

return array(
    'controllers' => array(
        'invokables' => array(
            'Deska\Controller\Deska' => 'Deska\Controller\DeskaController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'deska' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'deska' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/deska[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Deska\Controller\Deska',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
);

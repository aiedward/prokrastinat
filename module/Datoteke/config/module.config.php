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
			'Datoteke\Controller\Datoteke' => 'Datoteke\Controller\DatotekeController',
		),
	),

	'router' => array(
		'routes' => array(
			'datoteke' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/datoteke[/:action][/:id][/:file]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'file' => '.*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Datoteke\Controller\Datoteke',
						'action'     => 'index',
					),
				),
			),
		),
	),

	'view_manager' => array(
		'template_path_stack' => array(
			'datoteke' => __DIR__ . '/../view',
		),
	),
);
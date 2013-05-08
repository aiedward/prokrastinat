<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
	'service_manager' => array(
		'factories' => array(
			'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
			'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
		),
	),
	'translator' => array(
		'locale' => 'sl_SI',
		'translation_file_patterns' => array(
			array(
				'type'     => 'gettext',
				'base_dir' => __DIR__ . '/language',
				'pattern'  => '%s.mo',
			),
		),
	),
	'view_manager' => array(
		'template_map' => array(
			'layout/layouttwb'		=> 'view/layout.phtml',
			'error/404'				=> 'view/error/404.phtml',
			'error/index'			=> __DIR__ . '/../../view/error/index.phtml',
            'error/403'              => 'view/error/403.phtml',
        ),
		'display_not_found_reason'	=> true,
		'display_exceptions'		=> true,
		'not_found_template'		=> 'error/404',
		'exception_template'		=> 'error/index',
	),
	'doctrine' => array(
		'authentication' => array(
			'orm_default' => array(
				'object_manager' => 'Doctrine\ORM\EntityManager',
				'identity_class' => 'Prokrastinat\Entity\User',
				'identity_property' => 'username',
				'credential_property' => 'password',
				'credentialCallable' => 'Prokrastinat\Repository\User::hashPassword'
			),
		),
	),
	'db' => array(
		'driver'         => 'Pdo',
			'dsn'            => 'mysql:dbname=feriprojekt;host=localhost',
			'driver_options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
				),
	),
);

<?php
return array(
	'modules' => array(
		'ZendDeveloperTools',
		'DoctrineModule',
		'DoctrineORMModule',
		'DluTwBootstrap',
		'Prokrastinat',
		'Vprasanja',
		'Deska',
		'Datoteke',
	),
	'module_listener_options' => array(
		'module_paths' => array(
			'./module',
			'./vendor'
		),
		'config_glob_paths' => array('config/autoload/{,*.}{global,local}.php')
	)
);

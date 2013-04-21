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
		),
	),
	'translator' => array(
		'locale' => 'en_US',
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
			'layout/layouttwb'			=> 'view/layout.phtml',
			'error/404'				=> 'view/error/404.phtml',
			'error/index'			=> __DIR__ . '/../../view/error/index.phtml',
		),
		'display_not_found_reason'	=> true,
		'display_exceptions'		=> true,
		'not_found_template'		=> 'error/404',
		'exception_template'		=> 'error/index',
	),
);

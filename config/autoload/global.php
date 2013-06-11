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
            'doctrine.entitymanager.orm_urniki' => new DoctrineORMModule\Service\EntityManagerFactory('orm_urniki'),
            'doctrine.connection.orm_urniki' => new DoctrineORMModule\Service\DBALConnectionFactory('orm_urniki'),
            'doctrine.configuration.orm_urniki' => new DoctrineORMModule\Service\ConfigurationFactory('orm_urniki'),
            'doctrine.driver.orm_urniki'       => new DoctrineModule\Service\DriverFactory('orm_urniki'),
            'doctrine.entitymanager.orm_aips' => new DoctrineORMModule\Service\EntityManagerFactory('orm_aips'),
            'doctrine.connection.orm_aips' => new DoctrineORMModule\Service\DBALConnectionFactory('orm_aips'),
            'doctrine.configuration.orm_aips' => new DoctrineORMModule\Service\ConfigurationFactory('orm_aips'),
            'doctrine.driver.orm_aips'       => new DoctrineModule\Service\DriverFactory('orm_aips'),
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
            'layout/layouttwb'        => 'view/layout.phtml',
            'error/404'                => 'view/error/404.phtml',
            'error/index'            => 'view/error/index.phtml',
            'error/403'             => 'view/error/403.phtml',
        ),
        'display_not_found_reason'    => true,
        'display_exceptions'        => true,
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        'forbidden_template'        => 'error/403',
    ),
    'doctrine' => array(
        'configuration' => array(
            'orm_urniki' => array(
                'metadata_cache'    => 'array',
                'query_cache'       => 'array',
                'result_cache'      => 'array',
                'driver'            => 'orm_urniki',
                'generate_proxies'  => true,
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'   => 'DoctrineORMModule\Proxy',
                'filters'           => array(),
                'types' => array(
                    'msdatetime' => 'Prokrastinat\DBAL\Types\MSDateTimeType'
                )
            ),
            'orm_aips' => array(
                'metadata_cache'    => 'array',
                'query_cache'       => 'array',
                'result_cache'      => 'array',
                'driver'            => 'orm_aips',
                'generate_proxies'  => true,
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'   => 'DoctrineORMModule\Proxy',
                'filters'           => array(),
                'types' => array(
                    'msdatetime' => 'Prokrastinat\DBAL\Types\MSDateTimeType'
                )
            )
        ),
        'entitymanager' => array(
            'orm_urniki' => array(
                'connection'    => 'orm_urniki',
                'configuration' => 'orm_urniki'
            ),
            'orm_aips' => array(
                'connection'    => 'orm_aips',
                'configuration' => 'orm_aips'
            ),
        ),
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Prokrastinat\Entity\User',
                'identity_property' => 'username',
                'credential_property' => 'password',
                'credentialCallable' => 'Prokrastinat\Repository\UserRepository::hashPassword'
            ),
        ),
    ),
);

<?php
return array(
    'zfcrbac' => array(
        'anonymousRole' => 'anonymous',
        'firewallRoute' => true,
        'firewallController' => false,
        
        'template' => 'error/403',
        
        'firewalls' => array(
            /*'ZfcRbac\Firewall\Controller' => array(
                array('controller' => 'index', 'actions' => 'index', 'roles' => 'guest')
            ),*/
            'ZfcRbac\Firewall\Route' => array(
                array('route' => 'profiles/add', 'roles' => 'member'),
                array('route' => 'admin/*', 'roles' => 'administrator')
            ),
        ),
        'providers' => array(
            'ZfcRbac\Provider\AdjacencyList\Role\DoctrineDbal' => array(
                'connection' => 'doctrine.connection.orm_default',
                'options' => array(
                    'table'         => 'rbac_role',
                    'id_column'     => 'id',
                    'name_column'   => 'name',
                    'join_column'   => 'parent_role_id'
                )
            ),
            'ZfcRbac\Provider\Generic\Permission\DoctrineDbal' => array(
                'connection' => 'doctrine.connection.orm_default',
                'options' => array(
                    'permission_table'      => 'rbac_permissions',
                    'permission_id_column'  => 'id',
                    'permission_name_column'=> 'name',
                    'permission_join_column'=> 'role_id',
                    'role_table'            => 'rbac_role',
                    'role_join_table'       => 'rbac_role_permission',
                    'role_id_column'        => 'id',
                    'role_name_column'      => 'name',
                    'role_join_column'      => 'role_id',
                )
            ),
        ),
        'identity_provider' => 'prokrastinat_identity',
    ),
    'service_manager' => array(
        'factories' => array(
            'prokrastinat_identity' => function ($sm) {
                return new \Prokrastinat\Identity\ProkrastinatIdentity($sm);
            }
        )
    ),
);
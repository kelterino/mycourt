<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace MyCourt;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
 'navigation' => [
        'default' => [
            [
                'label' => 'Platzbelegung',
                'route' => 'home',
            ],
            [
                'label' => 'Mein Account',
                'route' => 'account',
                'action' => 'edit',
            ],
            [
                'label' => 'Administration',
                'uri' => '#',
                'pages' => [
                    [
                        'label'  => 'Benutzerverwaltung',
                        'route'  => 'account',
                        'action' => 'list',
                    ],
                ],
            ],
        ],
        'login' => [
            [
                'label' => 'Login',
                'route' => 'account',
                'action' => 'login',
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'account' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/account[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\AccountController::class,
                        'action'     => 'account',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\AccountController::class => InvokableFactory::class,
            'leasecertificate' => 'Christoph\Navigation\Service\LeasecertificateNavigationFactory',            
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'my_court/index/index' => __DIR__ . '/../view/my_court/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'ApplicationDriver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' =>[__DIR__ . '/../src/MyCourt/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                     'MyCourt\Entity' => 'ApplicationDriver'
                ]
            ]
        ]
    ],
];

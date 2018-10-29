<?php

namespace MyCourt\Factory;

use MyCourt\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,$requestedName, array $options = null)
    {
        return new IndexController(
            $container->get(\Doctrine\ORM\EntityManager::class)
        );
    }
}
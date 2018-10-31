<?php

namespace MyCourt\Factory;

use MyCourt\Controller\CourtController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CourtControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,$requestedName, array $options = null)
    {
        return new CourtController(
            $container->get(\Doctrine\ORM\EntityManager::class)
        );
    }
}
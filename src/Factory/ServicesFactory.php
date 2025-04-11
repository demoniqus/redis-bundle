<?php

namespace Demoniqus\CacheBundle\Factory;

use Cache\Service\CacheServiceInterface;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class ServicesFactory implements ServicesFactoryInterface
{
    private array $services = [];

    public function registerService(string $serviceAlias, CacheServiceInterface $service): void
    {
        $this->services[$serviceAlias] = $service;
    }

    public function getService(string $serviceAlias): CacheServiceInterface
    {


        return $this->services[$serviceAlias];
    }
}

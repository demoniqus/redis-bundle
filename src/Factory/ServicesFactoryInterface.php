<?php

namespace Demoniqus\CacheBundle\Factory;

use Cache\Service\CacheServiceInterface;

interface ServicesFactoryInterface
{
    public function getService(string $serviceAlias): CacheServiceInterface;

}

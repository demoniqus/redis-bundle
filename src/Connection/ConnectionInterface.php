<?php

namespace Demoniqus\RedisBundle\Connection;

use Demoniqus\CacheBundle\Interfaces\Common\CacheInterface;

interface ConnectionInterface extends CacheInterface
{
    /**
     * @return \Redis
     */
    public function getClient();



}

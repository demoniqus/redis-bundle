<?php

namespace Demoniqus\RedisBundle\Connection;

interface ConnectionInterface
{
    /**
     * @return \Redis
     */
    public function getClient();

}

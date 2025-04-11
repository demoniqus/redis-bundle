<?php

declare(strict_types=1);
namespace Demoniqus\RedisBundle\Adapter;

use Demoniqus\RedisBundle\Traits\RedisTrait;
use Symfony\Component\Cache\Adapter\AbstractAdapter;

class RedisAdapter extends AbstractAdapter
{
    use RedisTrait;
    /**
     * @param \Redis|\RedisArray|\RedisCluster|\Predis\Client $redisClient     The redis client
     * @param string                                          $namespace       The default namespace
     * @param int                                             $defaultLifetime The default lifetime
     */
    public function __construct($redisClient, $namespace = '', $defaultLifetime = 0)
    {
        $this->init($redisClient, $namespace, $defaultLifetime);
    }

}

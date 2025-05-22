<?php

declare(strict_types=1);

/*
 * This file is part of the package ITE product.
 *
 * Developer list:
 * (c) Dmitry Antipov <demoniqus@mail.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

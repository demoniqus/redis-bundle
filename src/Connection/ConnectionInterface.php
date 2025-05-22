<?php

/*
 * This file is part of the package ITE product.
 *
 * Developer list:
 * (c) Dmitry Antipov <demoniqus@mail.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demoniqus\RedisBundle\Connection;

use Demoniqus\CacheBundle\Interfaces\Common\CacheInterface;

interface ConnectionInterface extends CacheInterface
{
    public function eval(string $script, array $args = [], int $num_keys = 0);

    public function hMSet(string $key, array $values, ?array $options): ConnectionInterface;

    public function hSet(string $key, string $member, $value): ConnectionInterface;

    public function beginTransaction(): ConnectionInterface;

    public function expire(string $key, int $timeout, string $mode = null): ConnectionInterface;
}

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

namespace Demoniqus\RedisBundle\Storage;

use Demoniqus\CacheBundle\Interfaces\Common\CacheStorageInterface;
use Demoniqus\RedisBundle\Connection\ConnectionInterface;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;
use Demoniqus\RedisBundle\Factory\ConnectionsFactoryInterface;

class CacheStorage implements CacheStorageInterface
{
    private ConnectionInterface $connection;

    public function __construct(
        ConnectionsFactoryInterface $connectionsFactory,
        MetadataInterface $connectionParams,
        array $connectionOptions = []
    ) {
        $this->connection = $connectionsFactory->createConnection($connectionParams, $connectionOptions);
    }

    public function put(string $key, $value, ?array $options = []): CacheStorageInterface
    {
        $this->connection->put($key, $value, $options);

        return $this;
    }

    public function get(string $key)
    {
        return $this->connection->get($key);
    }

    public function has(string $key): bool
    {
        return $this->connection->has($key);
    }

    public function delete(string $key): CacheStorageInterface
    {
        $this->connection->delete($key);

        return $this;
    }

    public function eval(string $script, array $args = [], int $num_keys = 0)
    {
        return $this->connection->eval($script, $args, $num_keys);
    }

    public function hMSet(string $key, array $values, ?array $options): CacheStorageInterface
    {
        $this->connection->hMSet($key, $values, $options);

        return $this;
    }

    public function hSet(string $key, string $member, $value): CacheStorageInterface
    {
        $this->connection->hSet($key, $member, $value);

        return $this;
    }

    public function hGet(string $key, string $member)
    {
        return $this->connection->hGet($key, $member);
    }

    public function hGetAll(string $key)
    {
        return $this->connection->hGetAll($key);
    }

    public function beginTransaction(): CacheStorageInterface
    {
        $this->connection->beginTransaction();

        return $this;
    }

    public function commit(): void
    {
        $this->connection->commit();
    }

    public function expire(string $key, int $timeout, string $mode = null): CacheStorageInterface
    {
        $this->connection->expire($key, $timeout, $mode);

        return $this;
    }
}

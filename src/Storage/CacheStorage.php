<?php

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
    )
    {

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
}

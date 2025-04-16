<?php

namespace Demoniqus\RedisBundle\Connection;



use Demoniqus\CacheBundle\Interfaces\Common\CacheInterface;
use Demoniqus\RedisBundle\Adapter\RedisAdapter;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;

class Connection implements ConnectionInterface
{
    private $client;
    private MetadataInterface $metadata;

    public function __construct(string $dsn, MetadataInterface $metadata, array $connectionOptions = [])
    {
        $this->client = RedisAdapter::createConnection($dsn, $connectionOptions);
        $this->metadata = $metadata;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function put(string $key, $value, ?array $options = []): CacheInterface
    {
        $this->client->set(
            $this->generateKey($key),
            $this->serializeData($value)
        );

        return $this;
    }

    public function get(string $key)
    {
        $this->client->get($this->generateKey($key));
    }

    public function has(string $key): bool
    {
        return  (bool)$this->client->keys($this->generateKey($key));

    }

    public function delete(string $key): CacheInterface
    {
        // TODO: Implement delete() method.
    }

    private function generateKey(string $key): string {
        return $this->metadata->getPrefix() . ':' . $key;
    }

    private function serializeData($value)
    {
        //TODO реализовать сериализацию данных, если это необходимо
        return $value;
    }
}

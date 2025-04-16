<?php

namespace Demoniqus\RedisBundle\Connection;



use Demoniqus\CacheBundle\Interfaces\Common\CacheInterface;
use Demoniqus\RedisBundle\Adapter\RedisAdapter;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;
use Demoniqus\RedisBundle\Exception\UnknownClientTypeException;

class Connection implements ConnectionInterface
{
    /**
     * @var \Predis\Client|\Redis|\Symfony\Component\Cache\Traits\RedisProxy
     */
    private $client;
    private MetadataInterface $metadata;

    public function __construct(string $dsn, MetadataInterface $metadata, array $connectionOptions = [])
    {
        $this->client = RedisAdapter::createConnection($dsn, $connectionOptions);
        $this->metadata = $metadata;
        if (!($this->client instanceof \Redis)) {
            throw new UnknownClientTypeException('Client must be instance of \\Redis');
        }
    }

    public function getClient()
    {
        return $this->client;
    }

    public function put(string $key, $value, ?array $options = []): CacheInterface
    {
        //TODO Продумать сохранение ассоциативного массива https://ru.hexlet.io/courses/redis-basics/lessons/hashes/theory_unit
//        $key = $this->generateKey($key);
//        if (is_array($value)) {
//            $this->client->hMset($key, $value);
//
//            return $this;
//        }

        $this->client->set(
            $this->generateKey($key),
            $this->serializeData($value)
        );

        return $this;
    }

    public function get(string $key)
    {
        return $this->client->get($this->generateKey($key));
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
        //TODO реализовать сериализацию данных, если это необходимо/ Скорее всего отдельные сервисы сами должны подготавливать данные
        return $value;
    }
}

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
use Demoniqus\RedisBundle\Adapter\RedisAdapter;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;
use Demoniqus\RedisBundle\Exception\UnknownClientTypeException;
use Demoniqus\RedisBundle\Interfaces\Common\OptionsModelInterface;

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

    public function put(string $key, $value, ?array $options = []): CacheInterface
    {
        //TODO Продумать сохранение ассоциативного массива https://ru.hexlet.io/courses/redis-basics/lessons/hashes/theory_unit
//        $key = $this->generateKey($key);
//        if (is_array($value)) {
//            $this->client->hMset($key, $value);
//
//            return $this;
//        }
        $key = $this->generateKey($key);

        if ($options[OptionsModelInterface::EXPIRE_TIME] ?? null) {
            $this->client->setex($key, $options[OptionsModelInterface::EXPIRE_TIME], $this->serializeData($value));
        } else {
            $this->client->set(
                $key,
                $this->serializeData($value)
            );
        }

        return $this;
    }

    public function get(string $key)
    {
        return $this->client->get($this->generateKey($key));
    }

    public function beginTransaction(): ConnectionInterface
    {
        $this->client->multi();

        return $this;
    }

    public function commit(): void
    {
        $this->client->exec();
    }

    public function has(string $key): bool
    {
        return (bool) $this->client->keys($this->generateKey($key));
    }

    public function delete(string $key): CacheInterface
    {
        $this->client->del($this->generateKey($key));

        return $this;
    }

    private function generateKey(string $key): string
    {
        return $this->metadata->getPrefix().':'.$key;
    }

    private function serializeData($value)
    {
        //TODO реализовать сериализацию данных, если это необходимо/ Скорее всего отдельные сервисы сами должны подготавливать данные
        return $value;
    }

    public function eval(string $script, array $args = [], int $num_keys = 0)
    {
        return $this->client->eval($script, $args, $num_keys);
    }

    public function hMSet(string $key, array $values, ?array $options): ConnectionInterface
    {
        $this->client->hMSet($this->generateKey($key), $values);

        return $this;
    }

    public function hSet(string $key, string $member, $value): ConnectionInterface
    {
        $this->client->hSet($this->generateKey($key), $member, $value);

        return $this;
    }

    public function hGet(string $key, string $member)
    {
        return $this->client->hGet($this->generateKey($key), $member);
    }

    public function hGetAll(string $key)
    {
        return $this->client->hGetAll($this->generateKey($key));
    }

    public function expire(string $key, int $timeout, string $mode = null): ConnectionInterface
    {
        $this->client->expire($this->generateKey($key), $timeout);

        return $this;
    }
}

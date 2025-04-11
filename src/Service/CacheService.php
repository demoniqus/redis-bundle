<?php

declare(strict_types=1);
namespace Demoniqus\RedisBundle\Service;
use Demoniqus\CacheBundle\Interfaces\Common\CacheServiceConfigInterface as CommonCacheServiceConfigInterface;
use Demoniqus\CacheBundle\Interfaces\Common\CacheServiceInterface;
use Demoniqus\RedisBundle\Config\CacheServiceConfigInterface;
use Demoniqus\RedisBundle\Exception\IncorrectCacheServiceConfigException;
use Demoniqus\RedisBundle\Factory\ConnectionsFactoryInterface;

class CacheService implements CacheServiceInterface
{
    private ConnectionsFactoryInterface $connectionsFactory;

    private $currentConnection;
    public function __construct(
        ConnectionsFactoryInterface $connectionsFactory
    )
    {
        $this->connectionsFactory = $connectionsFactory;
    }

    public function put($key, $value, ?array $options = []): CacheServiceInterface
    {
        // TODO: Implement put() method.
    }

    public function get(string $key)
    {
        // TODO: Implement get() method.
    }

    public function has(string $key): bool
    {
        // TODO: Implement has() method.
    }

    public function configure(CommonCacheServiceConfigInterface $config): CacheServiceInterface
    {
        if (!($config instanceof CacheServiceConfigInterface)) {
            throw new IncorrectCacheServiceConfigException();
        }

        return $this;
    }

    public function delete(string $key): CacheServiceInterface
    {
        // TODO: Implement delete() method.

        return $this;
    }

    public function destruct(): void
    {
        // TODO: Implement destruct() method.
    }
}

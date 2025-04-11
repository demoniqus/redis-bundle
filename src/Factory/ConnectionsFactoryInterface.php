<?php

namespace Demoniqus\RedisBundle\Factory;



use Demoniqus\RedisBundle\Connection\ConnectionInterface;

interface ConnectionsFactoryInterface
{
    public function createConnection(string $connectionAlias, bool $newConnection = false, array $connectionOptions = []): ConnectionInterface;
}

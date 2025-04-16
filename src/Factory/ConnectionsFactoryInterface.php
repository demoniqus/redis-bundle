<?php

namespace Demoniqus\RedisBundle\Factory;



use Demoniqus\RedisBundle\Connection\ConnectionInterface;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;

interface ConnectionsFactoryInterface
{
    public function createConnection(MetadataInterface $metadata, array $connectionOptions = []): ConnectionInterface;
}

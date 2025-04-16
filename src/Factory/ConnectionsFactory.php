<?php

namespace Demoniqus\RedisBundle\Factory;



use Demoniqus\RedisBundle\Connection\Connection;
use Demoniqus\RedisBundle\Connection\ConnectionInterface;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;

class ConnectionsFactory implements ConnectionsFactoryInterface
{
    /**
     * @var ConnectionInterface[]
     */
    private array $connectionsCache = [];

    public function createConnection(MetadataInterface $metadata, array $connectionOptions = []): ConnectionInterface
    {
        $dsn = $this->getDsn($metadata);

        return $this->connectionsCache[$dsn] ??
            ($this->connectionsCache[$dsn] = new Connection($dsn, $metadata, $connectionOptions));

    }

    private function getDsn(MEtadataInterface $metadata): string
    {
        $protocol = '';
        if ($metadata->getProtocol()) {
            $protocol = $metadata->getProtocol() . '://';
        }

        $auth = '';
        if ($metadata->getPrefix() || $metadata->getPassword()) {
            $auth = $metadata->getPrefix() . ':' . $metadata->getPassword() . '@';
        }

        $host = '';
        if ($metadata->getHost() || $metadata->getPort()) {
            $host = $metadata->getHost() . ':' . $metadata->getPort();
        }

        return $protocol . $auth . $host;
    }
}

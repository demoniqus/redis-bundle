<?php

namespace Demoniqus\RedisBundle\Factory;



use Demoniqus\RedisBundle\Connection\Connection;
use Demoniqus\RedisBundle\Connection\ConnectionInterface;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;

class ConnectionsFactory implements ConnectionsFactoryInterface
{
    protected $test = null;
    /**
     * @var ConnectionInterface[]
     */
    private array $connectionsCache = [];

    private array $connectionsMetadata = [];

    public function setConnection (string $alias, MetadataInterface $metadata): void
    {
        $this->connectionsMetadata[$alias] = $metadata;
    }

    public function createConnection(string $connectionAlias, bool $newConnection = false, array $connectionOptions = []): ConnectionInterface
    {
        if (!isset($this->connectionsMetadata[$connectionAlias])) {
            throw new \Exception('Connection "' . $connectionAlias . '" does not defined.');

        }

        if ($newConnection) {
            return $this->initConnection($this->connectionsMetadata[$connectionAlias]);
        }

        return $this->connectionsCache[$connectionAlias] ??
            ($this->connectionsCache[$connectionAlias] = $this->initConnection($this->connectionsMetadata[$connectionAlias]));

    }

    private function initConnection(MetadataInterface $metadata, array $connectionOptions = []): ConnectionInterface
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

        $dsn = $protocol . $auth . $host;

        return new Connection($dsn, $connectionOptions);
    }
}

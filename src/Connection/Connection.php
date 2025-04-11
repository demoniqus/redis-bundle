<?php

namespace Demoniqus\RedisBundle\Connection;



use Demoniqus\RedisBundle\Adapter\RedisAdapter;

class Connection implements ConnectionInterface
{
    private $client;
    public function __construct(string $dsn, array $connectionOptions = [])
    {
        $this->client = RedisAdapter::createConnection($dsn, $connectionOptions);
    }

    public function getClient()
    {
        return $this->client;
    }

}

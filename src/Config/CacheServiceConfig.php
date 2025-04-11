<?php

namespace Demoniqus\RedisBundle\Config;

class CacheServiceConfig implements CacheServiceConfigInterface
{
    private ?string $protocol;
    private ?string $prefix;
    private ?string $password;
    private ?string $host;
    private ?int $port;
    private ?string $socket;

    public function __construct(
        ?string $protocol = null,
        ?string $prefix = null,
        ?string $password = null,
        ?string $host = null,
        ?int $port = null,
        ?string $socket = null
    )
    {

        $this->protocol = $protocol;
        $this->prefix = $prefix;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;
        $this->socket = $socket;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getSocket(): ?string
    {
        return $this->socket;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }
}

<?php

namespace Demoniqus\RedisBundle\Connection\Metadata;

class Metadata implements MetadataInterface
{
    private ?string $host;
    private ?string $protocol;
    private ?string $prefix;
    private ?string $password;
    private ?int $port;

    public function __construct(
        ?string $protocol = null,
        ?string $prefix = null,
        ?string $password = null,
        ?string $host = null,
        ?int $port = null

    ) {

        $this->protocol = $protocol;
        $this->prefix = $prefix;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

}

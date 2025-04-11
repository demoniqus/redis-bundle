<?php

namespace Demoniqus\RedisBundle\Connection\Metadata;

interface MetadataInterface
{
    public function getPrefix(): ?string;
    public function getPassword(): ?string;
    public function getHost(): ?string;
    public function getPort(): ?int;
    public function getProtocol(): ?string;

}

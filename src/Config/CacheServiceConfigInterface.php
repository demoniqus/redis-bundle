<?php

namespace Demoniqus\RedisBundle\Config;

use Demoniqus\CacheBundle\Interfaces\Common\CacheServiceConfigInterface as CommonCacheServiceConfigInterface;

interface CacheServiceConfigInterface extends CommonCacheServiceConfigInterface
{
    public function getProtocol(): ?string;
    public function getPrefix(): ?string;
    public function getPassword(): ?string;
    public function getHost(): ?string;
    public function getSocket(): ?string;
    public function getPort(): ?int;

}

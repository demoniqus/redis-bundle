<?php

/*
 * This file is part of the package ITE product.
 *
 * Developer list:
 * (c) Dmitry Antipov <demoniqus@mail.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demoniqus\RedisBundle\Connection\Metadata;

interface MetadataInterface
{
    public function getPrefix(): ?string;

    public function getPassword(): ?string;

    public function getHost(): ?string;

    public function getPort(): ?int;

    public function getProtocol(): ?string;
}

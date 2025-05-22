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

namespace Demoniqus\RedisBundle\Factory;

use Demoniqus\RedisBundle\Connection\ConnectionInterface;
use Demoniqus\RedisBundle\Connection\Metadata\MetadataInterface;

interface ConnectionsFactoryInterface
{
    public function createConnection(MetadataInterface $metadata, array $connectionOptions = []): ConnectionInterface;
}

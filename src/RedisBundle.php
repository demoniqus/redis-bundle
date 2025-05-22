<?php

declare(strict_types=1);

/*
 * This file is part of the package ITE product.
 *
 * Developer list:
 * (c) Dmitry Antipov <demoniqus@mail.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Demoniqus\RedisBundle;

use Demoniqus\RedisBundle\DependencyInjection\Compiler\RedisCompiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RedisBundle extends Bundle
{
    public const REDIS_BUNDLE = 'redis';

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new RedisCompiler());
    }
}

<?php

declare(strict_types=1);
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

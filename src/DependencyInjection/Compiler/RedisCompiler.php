<?php
declare(strict_types=1);
namespace Demoniqus\RedisBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RedisCompiler implements CompilerPassInterface
{
    private ?ContainerBuilder $container = null;

    public function process(ContainerBuilder $container)
    {
        $this
            ->setContainer($container)
            ->addServices()
        ;
    }

    public function setContainer($container): self
    {
        $this->container = $container;

        return $this;
    }

    private function addServices(): self
    {


        return $this;
    }
}

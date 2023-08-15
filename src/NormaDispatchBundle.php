<?php

namespace NormaUy\Bundle\NormaDispatchBundle;

use NormaUy\Bundle\NormaDispatchBundle\DependencyInjection\NormaDispatchExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
class NormaDispatchBundle extends AbstractBundle
{
    public const VERSION = '0.1';

    public function build(ContainerBuilder $container): void
    {
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new NormaDispatchExtension();
        }
        return $this->extension;
    }
}

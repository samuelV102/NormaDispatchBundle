<?php

namespace NormaUy\Bundle\TemplateSymfonyBundle;

use NormaUy\Bundle\TemplateSymfonyBundle\DependencyInjection\TemplateExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
class TemplateSymfonyBundle extends AbstractBundle
{
    public const VERSION = '0.1';

    public function build(ContainerBuilder $container): void
    {
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new TemplateExtension();
        }
        return $this->extension;
    }
}

<?php

namespace NormaUy\Bundle\TemplateSymfonyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
class TemplateExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new TemplateConfiguration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter($this->getAlias() . '.example.enable', $config['example']['enable']);
        $container->setParameter($this->getAlias() . '.example2.permalink', $config['example2']['permalink']);

        $loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/../../config'));
        $loader->load('services.php');
    }

    public function getAlias(): string
    {
        return 'template_bundle';
    }
}

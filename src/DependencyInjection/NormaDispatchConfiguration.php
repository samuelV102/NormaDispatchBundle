<?php

namespace NormaUy\Bundle\NormaDispatchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\BooleanNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\VariableNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
class NormaDispatchConfiguration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('norma_dispatch_bundle');

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->arrayNode('example')
            ->addDefaultsIfNotSet()
            ->append($this->enableNode())
            ->info('')
            ->end()
            ->arrayNode('example2')
            ->addDefaultsIfNotSet()
            ->append($this->permalinkNode())
            ->info('')
            ->end()
            ->end();

        return $treeBuilder;
    }

    private function enableNode(): BooleanNodeDefinition
    {
        $node = new BooleanNodeDefinition('enable');
        $node->defaultTrue();

        return $node;
    }

    private function permalinkNode(): VariableNodeDefinition
    {
        $node = new VariableNodeDefinition('permalink');
        $node->defaultValue('\/{slug}\/');

        return $node;
    }
}

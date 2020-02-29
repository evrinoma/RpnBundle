<?php


namespace Evrinoma\RpnBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('rpn');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode->children()->scalarNode('operation_factory')->defaultNull()->end();

        return $treeBuilder;
    }
}
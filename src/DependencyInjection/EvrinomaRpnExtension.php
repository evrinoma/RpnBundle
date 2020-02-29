<?php


namespace Evrinoma\RpnBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;

class EvrinomaRpnExtension extends Extension
{
    public function getAlias()
    {
        return 'rpn';
    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);
        $definition = $container->getDefinition('evrinoma.argument.factory');
        $operationFactory = $config['operation_factory'];
        if (null !== $operationFactory) {
            $definition->setArgument(0,  new Reference($operationFactory));
        }
    }
}
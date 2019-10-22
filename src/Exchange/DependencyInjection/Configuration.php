<?php


namespace Exchange\DependencyInjection;


use Exchange\Twig\Extension\CalculationExtension;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('exchange');
        // BC layer for symfony/config < 4.2
        $rootNode = \method_exists($treeBuilder, 'getRootNode') ? $treeBuilder->getRootNode() : $treeBuilder->root('exchange');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('Exchange\Twig\Extension\CalculationExtension')
                    ->addDefaultChildrenIfNoneSet()
                    ->children()
                        ->booleanNode('public')->defaultTrue()->end()
                        ->scalarNode('tags')->defaultValue(['twig.extension'])
        ;

        return $treeBuilder;
    }
}
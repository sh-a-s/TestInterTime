<?php

namespace Shas\InternationalTimeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('international_time');

        $rootNode
            ->children()
                ->arrayNode('international_clocks')
                    ->children()
                        ->arrayNode('clock1')
                            ->children()
                                ->scalarNode('city')
                                    ->defaultValue('')
                                ->end()
                                ->scalarNode('offset')
                                    ->defaultValue('')
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('clock2')
                            ->children()
                                ->scalarNode('city')
                                    ->defaultValue('')
                                ->end()
                                ->scalarNode('offset')
                                    ->defaultValue('')
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('clock3')
                            ->children()
                                ->scalarNode('city')
                                    ->defaultValue('')
                                ->end()
                                ->scalarNode('offset')
                                    ->defaultValue('')
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('clock4')
                            ->children()
                                ->scalarNode('city')
                                    ->defaultValue('')
                                ->end()
                                ->scalarNode('offset')
                                    ->defaultValue('')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}

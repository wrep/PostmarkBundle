<?php

namespace MZ\PostmarkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mz_postmark');

        $rootNode
            ->children()
                ->scalarNode('api_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('from_email')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('from_name')
                    ->defaultTrue()
                ->end()
                ->scalarNode('use_ssl')
                    ->defaultTrue()
                ->end()
                ->scalarNode('timeout')
                    ->defaultValue(5)
                ->end()
            ->end();

        return $treeBuilder;
    }
}

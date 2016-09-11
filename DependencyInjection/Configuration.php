<?php

namespace Nathiss\Bundle\QuoteGeneratorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nathiss_quote_generator');

#         $rootNode
#             ->children()
#                 ->scalarNode('template')
#                     ->isRequired()
#                     ->info('Template for generated quote.')
#                 ->end()
#             ->end()
#         ;

        return $treeBuilder;
    }
}

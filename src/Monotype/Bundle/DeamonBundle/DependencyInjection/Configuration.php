<?php

namespace Monotype\Bundle\DeamonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
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
        $rootNode = $treeBuilder->root('deamon');

        return $treeBuilder;
    }

    public function appendTo(ArrayNodeDefinition &$rootNode)
    {
        $rootNode->append($this->addDaemonNode());
    }

    public function addDaemonNode()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('daemon');

        $rootNode->children()
            ->arrayNode('daemons')
            ->requiresAtLeastOneElement()
            ->useAttributeAsKey('name')
            ->prototype('array')
            ->children()
            ->scalarNode('appName')
            ->defaultValue('systemDaemon')
            ->end()
            ->scalarNode('appDir')
            ->defaultValue('%kernel.root_dir%')
            ->end()
            ->scalarNode('appDescription')
            ->defaultValue('System Daemon')
            ->end()
            ->scalarNode('logDir')
            ->defaultValue('%kernel.logs_dir%')
            ->end()
            ->scalarNode('authorName')
            ->defaultValue('')
            ->end()
            ->scalarNode('authorEmail')
            ->defaultValue('')
            ->end()
            ->scalarNode('appPidDir')
            ->defaultValue('%kernel.cache_dir%/daemons/')
            ->end()
            ->scalarNode('sysMaxExecutionTime')
            ->defaultValue('0')
            ->end()
            ->scalarNode('sysMaxInputTime')
            ->defaultValue('0')
            ->end()
            ->scalarNode('sysMemoryLimit')
            ->defaultValue('1024M')
            ->end()
            ->scalarNode('appUser')
            ->defaultValue('www-data')
            ->end()
            ->scalarNode('appGroup')
            ->defaultValue('www-data')
            ->end()
            ->scalarNode('appRunAsGID')
            ->defaultValue('1000')
            ->end()
            ->scalarNode('appRunAsUID')
            ->defaultValue('1000')
            ->end()
            ->end()
            ->end()
            ->end()
            ->scalarNode('debug')
            ->defaultValue('false')
            ->end()
            ->end();

        return $rootNode;
    }
}

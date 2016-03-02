<?php

namespace Monotype\Bundle\DeamonBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class DeamonExtension
 * @package Monotype\Bundle\DeamonBundle\DependencyInjection
 */
class DeamonExtension extends Extension
{

    /**
     * @var null
     */
    private $defaultUser = null;

    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $container->getParameter('uecode.daemon');
    }
}

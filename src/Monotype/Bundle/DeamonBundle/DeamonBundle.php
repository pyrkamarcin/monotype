<?php

namespace Monotype\Bundle\DeamonBundle;

use Monotype\Bundle\DeamonBundle\DependencyInjection\Compiler\InitPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class DeamonBundle
 * @package Monotype\Bundle\DeamonBundle
 */
class DeamonBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new InitPass(), PassConfig::TYPE_OPTIMIZE);
    }
}

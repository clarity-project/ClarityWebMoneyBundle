<?php

namespace Clarity\WebMoneyBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author varloc2000 <varloc2000@gmail.com>
 */
class ConfigurationCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $config = $container->getParameter('clarity_wm');

        $definition = $container->getDefinition('clarity_wm.webmoney.manager');
    }
}

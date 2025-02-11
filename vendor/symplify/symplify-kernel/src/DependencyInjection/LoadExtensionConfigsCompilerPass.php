<?php

declare (strict_types=1);
namespace VendorPatches202212\Symplify\SymplifyKernel\DependencyInjection;

use VendorPatches202212\Symfony\Component\DependencyInjection\Compiler\MergeExtensionConfigurationPass;
use VendorPatches202212\Symfony\Component\DependencyInjection\ContainerBuilder;
/**
 * Mimics @see \Symfony\Component\HttpKernel\DependencyInjection\MergeExtensionConfigurationPass without dependency on
 * symfony/http-kernel
 */
final class LoadExtensionConfigsCompilerPass extends MergeExtensionConfigurationPass
{
    public function process(ContainerBuilder $containerBuilder) : void
    {
        $extensionNames = \array_keys($containerBuilder->getExtensions());
        foreach ($extensionNames as $extensionName) {
            $containerBuilder->loadFromExtension($extensionName, []);
        }
        parent::process($containerBuilder);
    }
}

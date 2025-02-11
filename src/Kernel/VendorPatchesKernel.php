<?php

declare (strict_types=1);
namespace Symplify\VendorPatches\Kernel;

use VendorPatches202212\Psr\Container\ContainerInterface;
use VendorPatches202212\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class VendorPatchesKernel extends AbstractSymplifyKernel
{
    /**
     * @param string[] $configFiles
     */
    public function createFromConfigs(array $configFiles) : ContainerInterface
    {
        $configFiles[] = __DIR__ . '/../../config/config.php';
        return $this->create($configFiles);
    }
}

<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace VendorPatches202212\Symfony\Component\DependencyInjection;

use VendorPatches202212\Psr\Cache\CacheItemPoolInterface;
use VendorPatches202212\Symfony\Component\ExpressionLanguage\ExpressionLanguage as BaseExpressionLanguage;
if (!\class_exists(BaseExpressionLanguage::class)) {
    return;
}
/**
 * Adds some function to the default ExpressionLanguage.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @see ExpressionLanguageProvider
 */
class ExpressionLanguage extends BaseExpressionLanguage
{
    /**
     * {@inheritdoc}
     */
    public function __construct(CacheItemPoolInterface $cache = null, array $providers = [], callable $serviceCompiler = null, \Closure $getEnv = null)
    {
        // prepend the default provider to let users override it easily
        \array_unshift($providers, new ExpressionLanguageProvider($serviceCompiler, $getEnv));
        parent::__construct($cache, $providers);
    }
}

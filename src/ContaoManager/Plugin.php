<?php

declare(strict_types=1);

namespace Guave\CloudflareTurnstileBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Guave\CloudflareTurnstileBundle\GuaveCloudflareTurnstileBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(GuaveCloudflareTurnstileBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}

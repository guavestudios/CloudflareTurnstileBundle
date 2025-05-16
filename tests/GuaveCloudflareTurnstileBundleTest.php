<?php

declare(strict_types=1);

namespace Guave\CloudflareTurnstileBundle\Tests;

use Guave\CloudflareTurnstileBundle\GuaveCloudflareTurnstileBundle;
use PHPUnit\Framework\TestCase;

class GuaveCloudflareTurnstileBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new GuaveCloudflareTurnstileBundle();

        $this->assertInstanceOf('Guave\CloudflareTurnstileBundle\GuaveCloudflareTurnstileBundle', $bundle);
    }
}

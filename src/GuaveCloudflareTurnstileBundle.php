<?php

declare(strict_types=1);

namespace Guave\CloudflareTurnstileBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GuaveCloudflareTurnstileBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}

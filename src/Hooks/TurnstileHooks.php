<?php

namespace Guave\CloudflareTurnstileBundle\Hooks;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Widget;

#[AsHook('addCustomRegexp')]
class TurnstileHooks
{
    public function __invoke($regexpName, $value, Widget $widget): bool
    {
        if ($regexpName !== 'turnstile') {
            return false;
        }

        if (preg_match('/[^a-zA-Z\/_]/', $value) !== 0) {
            $widget->addError($GLOBALS['TL_LANG']['ERR']['turnstile_rgxp']);
        }

        return true;
    }
}

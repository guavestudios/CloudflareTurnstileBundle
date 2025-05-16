<?php

namespace Guave\CloudflareTurnstileBundle\Hooks;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Widget;

/**
 * @Hook("addCustomRegexp")
 */
class TurnstileHooks
{
    public function addTurnstileActionRegexp($regexpName, $value, Widget $widget): bool
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

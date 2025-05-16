<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addField('turnstileThreshold', 'config_legend')
    ->addField('turnstileAction', 'config_legend')
    ->applyToPalette('captcha', 'tl_form_field');

$GLOBALS['TL_DCA']['tl_form_field']['fields'] += [
    'turnstileThreshold' => [
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50 clr'],
        'sql' => ['type' => 'string', 'length' => 8, 'default' => ''],
    ],
    'turnstileAction' => [
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50', 'rgxp' => 'turnstile'],
        'sql' => ['type' => 'string', 'length' => 120, 'default' => ''],
    ],
];

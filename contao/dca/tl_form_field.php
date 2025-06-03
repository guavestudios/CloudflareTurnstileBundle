<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addField('turnstileAction', 'fconfig_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('captcha', 'tl_form_field');

$GLOBALS['TL_DCA']['tl_form_field']['fields'] += [
    'turnstileAction' => [
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50', 'rgxp' => 'turnstile'],
        'sql' => ['type' => 'string', 'length' => 120, 'default' => ''],
    ],
];

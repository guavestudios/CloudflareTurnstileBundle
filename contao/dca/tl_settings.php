<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addLegend('turnstile_legend', 'files_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField('turnstilePublicKey', 'turnstile_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('turnstilePrivateKey', 'turnstile_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_settings');

$GLOBALS['TL_DCA']['tl_settings']['fields'] += [
    'turnstilePublicKey' => [
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50 clr'],
    ],
    'turnstilePrivateKey' => [
        'inputType' => 'text',
        'eval' => ['tl_class' => 'w50'],
    ],
];

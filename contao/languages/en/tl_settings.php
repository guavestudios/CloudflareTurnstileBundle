<?php

$GLOBALS['TL_LANG']['tl_settings']['turnstile_legend'] = 'Security: Cloudflare Turnstile';

$GLOBALS['TL_LANG']['tl_settings']['turnstilePublicKey'] = [
    'Site key',
    "The key that's getting served to your users."
];
$GLOBALS['TL_LANG']['tl_settings']['turnstilePrivateKey'] = [
    'Secret key',
    "They key that's used for communication between Contao and Google."
];
$GLOBALS['TL_LANG']['tl_settings']['turnstileGlobalThreshold'] = [
    'Global score threshold',
    'reCAPTCHA v3 returns a score, based on which you can decide if a user is likely a bot or a human. A score of 1 most likely resembles a human, a score of 0 is most likely a bot. Any captcha request made has to be above this score to be considered safe.'
];

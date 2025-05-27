# Contao Cloudflare Turnstile Bundle

This Contao module overrides the default security questions/captcha form field with [Cloudflare Turnstile](https://www.cloudflare.com/application-services/products/turnstile/).

## Requirements

- Contao 4.13+
- PHP 7.4 or 8.0+

## Install

```BASH
$ composer require guave/cloudflareturnstile-bundle
```

## Usage

There are two ways to add the configuration needed:

a) Go to Settings in the Contao Backend and add your Turnstile Site Key and Secret Key under "Security: Cloudflare Turnstile"

or

b) Add your Turnstile Site Key and Secret Key on `system/config/localconfig.php`:

```PHP
$GLOBALS['TL_CONFIG']['turnstilePublicKey'] = '<YOUR-SITE-KEY>';
$GLOBALS['TL_CONFIG']['turnstilePrivateKey'] = '<YOUR-SECRET-KEY>';
$GLOBALS['TL_CONFIG']['turnstileGlobalThreshold'] = 0.5;
```

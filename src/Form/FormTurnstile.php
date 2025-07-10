<?php

namespace Guave\CloudflareTurnstileBundle\Form;

use Contao\Config;
use Contao\FormCaptcha;
use Contao\FormModel;
use Contao\System;
use RuntimeException;

class FormTurnstile extends FormCaptcha
{
    protected $strTemplate = 'form_turnstile';
    protected ?string $publicKey = null;
    protected ?string $privateKey = null;
    protected ?string $turnstileAction = null;

    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        $this->publicKey = Config::get('turnstilePublicKey');
        $this->privateKey = Config::get('turnstilePrivateKey');

        $this->turnstileAction = FormModel::findById($this->pid)->alias;
        $this->turnstileAction = str_replace('-', '_', $this->turnstileAction);
        $this->turnstileAction = preg_replace('/[^a-zA-Z\/_]/', '', $this->turnstileAction);

        if ($this->useFallback()) {
            $this->strTemplate = 'form_captcha';
        }
    }

    protected function useFallback(): bool
    {
        return !$this->publicKey || !$this->privateKey;
    }

    public function validate(): void
    {
        if ($this->useFallback()) {
            parent::validate();

            return;
        }

        try {
            $response = $_POST['cf-turnstile-response'] ?? false;
            if ($response === false) {
                throw new RuntimeException();
            }

            $curl = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');

            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query([
                'secret' => $this->privateKey,
                'response' => $response,
                'remoteip' => $_SERVER['REMOTE_ADDR'],
            ]));

            $response = curl_exec($curl);
            if ($response === false) {
                throw new RuntimeException();
            }

            $parsed = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
            if (!$parsed['success']) {
                if (in_array('invalid-input-secret', $parsed['error-codes'], true)) {
                    System::log('Cloudflare Turnstile private key is invalid.', __METHOD__, TL_CONFIGURATION);
                }

                throw new RuntimeException();
            }

            if ($parsed['action'] && $parsed['action'] !== $this->turnstileAction) {
                throw new RuntimeException();
            }
        } catch (RuntimeException $e) {
            $this->class = 'error';
            $this->addError($GLOBALS['TL_LANG']['ERR']['turnstile']);
        }
    }
}

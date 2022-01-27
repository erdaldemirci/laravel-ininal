<?php

namespace ErdalDemirci\Ininal\Services;

use Exception;
use ErdalDemirci\Ininal\Traits\IninalRequest as IninalAPIRequest;

class Ininal
{
    use IninalAPIRequest;

    /**
     * Ininal constructor.
     *
     * @param array $config
     *
     * @throws Exception
     */
    public function __construct(array $config = [])
    {
        // Setting Ininal API Credentials
        $this->setConfig($config);

        $this->httpBodyParam = 'form_params';

        $this->options = [];
        $this->options['headers'] = [
            "Language"      => $this->locale,
            "Content-Type"  => "application/json",
            "Date"          => gmdate('D, d M Y H:i:s T'),
            "Authorization" => $this->authorization,
        ];
    }

    /**
     * Set ExpressCheckout API endpoints & options.
     *
     * @param array $credentials
     */
    protected function setOptions(array $credentials): void
    {
        // Setting API Endpoints
        $this->config['api_url'] = 'https://api.ininal.com';

        if ($this->mode === 'sandbox') {
            $this->config['api_url'] = 'https://sandbox-api.ininal.com';
        }

        // Adding params outside sandbox / live array
        $this->config['payment_action'] = $credentials['payment_action'];
        $this->config['notify_url'] = $credentials['notify_url'];
        $this->config['locale'] = $credentials['locale'];
    }
}

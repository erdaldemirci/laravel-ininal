<?php

namespace ErdalDemirci\Ininal\Traits;

use RuntimeException;

trait IninalRequest
{
    use IninalHttpClient;
    use IninalAPI;

    /**
     * Ininal API mode to be used.
     *
     * @var string
     */
    public $mode;

    /**
     * Ininal access token.
     *
     * @var string
     */
    protected $access_token;

    /**
     * Ininal API configuration.
     *
     * @var array
     */
    private $config;

    /**
     * Default currency for Ininal.
     *
     * @var string
     */
    protected $currency;

    /**
     * Additional options for Ininal API request.
     *
     * @var array
     */
    protected $options;

    /**
     * Set Ininal API Credentials.
     *
     * @param array $credentials
     *
     * @throws \RuntimeException|\Exception
     */
    public function setApiCredentials(array $credentials): void
    {
        if (empty($credentials)) {
            $this->throwConfigurationException();
        }

        // Setting Default Ininal Mode If not set
        $this->setApiEnvironment($credentials);

        // Set API configuration for the Ininal provider
        $this->setApiProviderConfiguration($credentials);

        // Set Http Client configuration.
        $this->setHttpClientConfiguration();
    }

    /**
     * Function to add request header.
     *
     * @param string $key
     * @param string $value
     *"
     * @return \ErdalDemirci\Ininal\Services\Ininal
     */
    public function setRequestHeader(string $key, string $value): \ErdalDemirci\Ininal\Services\Ininal
    {
        $this->options['headers'][$key] = $value;

        return $this;
    }

    /**
     * Return request options header.
     *
     * @param string $key
     *
     * @return string
     * @throws \RuntimeException
     *
     */
    public function getRequestHeader(string $key): string
    {
        if (isset($this->options['headers'][$key])) {
            return $this->options['headers'][$key];
        }

        throw new RuntimeException('Options header is not set.');
    }

    /**
     * Function To Set Ininal API Configuration.
     *
     * @param array $config
     *
     * @throws \Exception
     */
    private function setConfig(array $config): void
    {
        $api_config = function_exists('config') && !empty(config('ininal')) ? config('ininal') : $config;

        // Set Api Credentials
        $this->setApiCredentials($api_config);
    }

    /**
     * Set API environment to be used by Ininal.
     *
     * @param array $credentials
     */
    private function setApiEnvironment(array $credentials): void
    {
        $this->mode = 'live';

        if (!empty($credentials['mode'])) {
            $this->setValidApiEnvironment($credentials['mode']);
        } else {
            $this->throwConfigurationException();
        }
    }

    /**
     * Validate & set the environment to be used by Ininal.
     *
     * @param string $mode
     */
    private function setValidApiEnvironment(string $mode): void
    {
        $this->mode = !in_array($mode, ['sandbox', 'live']) ? 'live' : $mode;
    }

    /**
     * Set configuration details for the provider.
     *
     * @param array $credentials
     *
     * @throws \Exception
     */
    private function setApiProviderConfiguration(array $credentials): void
    {
        // Setting Ininal API Credentials

        $config_params = ['api_key', 'api_secret'];

        foreach ($config_params as $item) {
            if (empty($credentials[$item])) {
                throw new RuntimeException("{$item} missing from the provided configuration. Please add your application {$item}.");
            }
        }

        collect($credentials)->map(function ($value, $key) {
            $this->config[$key] = $value;
        });

        $this->locale = $credentials['locale'];

        $this->setOptions($credentials);
    }

    /**
     * @throws RuntimeException
     */
    private function throwConfigurationException()
    {
        throw new RuntimeException('Invalid configuration provided. Please provide valid configuration for Ininal API. You can also refer to the documentation at https://erdaldemirci.github.io/laravel-ininal/docs.html to setup correct configuration.');
    }
}

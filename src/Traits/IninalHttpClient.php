<?php

namespace ErdalDemirci\Ininal\Traits;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException as HttpClientException;
use GuzzleHttp\Utils;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

trait IninalHttpClient
{
    /**
     * Http Client class object.
     *
     * @var HttpClient
     */
    private $client;

    /**
     * Http Client configuration.
     *
     * @var array
     */
    private $httpClientConfig;

    /**
     * Ininal API Endpoint.
     *
     * @var string
     */
    private $apiUrl;

    /**
     * Ininal API Endpoint.
     *
     * @var string
     */
    private $apiEndPoint;

    /**
     * IPN notification url for Ininal.
     *
     * @var string
     */
    private $notifyUrl;

    /**
     * Http Client request body parameter name.
     *
     * @var string
     */
    private $httpBodyParam;

    /**
     * Default payment action for Ininal.
     *
     * @var string
     */
    private $paymentAction;

    /**
     * Default locale for Ininal.
     *
     * @var string
     */
    private $locale;

    /**
     * Default authorization for Ininal.
     *
     * @var string
     */
    private $authorization;

    /**
     * Request type.
     *
     * @var string
     */
    protected $method = 'post';

    /**
     * Set curl constants if not defined.
     *
     * @return void
     */
    protected function setCurlConstants()
    {
        $constants = [
            'CURLOPT_SSLVERSION'        => 32,
            'CURL_SSLVERSION_TLSv1_2'   => 6,
            'CURLOPT_SSL_VERIFYPEER'    => 64,
            'CURLOPT_SSLCERT'           => 10025,
        ];

        foreach ($constants as $key => $item) {
            $this->defineCurlConstant($key, $item);
        }
    }

    /**
     * Declare a curl constant.
     *
     * @param string $key
     * @param string $value
     *
     * @return bool
     */
    protected function defineCurlConstant(string $key, string $value)
    {
        return defined($key) ? true : define($key, $value);
    }

    /**
     * Function to initialize/override Http Client.
     *
     * @param \GuzzleHttp\Client|null $client
     *
     * @return void
     */
    public function setClient(HttpClient $client = null)
    {
        if ($client instanceof HttpClient) {
            $this->client = $client;

            return;
        }

        $this->client = new HttpClient([
            'curl' => $this->httpClientConfig,
        ]);
    }

    /**
     * Function to set Http Client configuration.
     *
     * @return void
     */
    protected function setHttpClientConfiguration()
    {
        $this->setCurlConstants();

        $this->httpClientConfig = [
            CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
            CURLOPT_SSL_VERIFYPEER => true,
        ];

        // Initialize Http Client
        $this->setClient();

        // Set default values.
        $this->setDefaultValues();

    }

    /**
     * Set default values for configuration.
     *
     * @return void
     */
    private function setDefaultValues()
    {

        $locale = empty($this->locale) ? 'TR' : $this->locale;
        $this->locale = $locale;

    }

    /**
     * Perform Ininal API request & return response.
     *
     * @throws \Throwable
     *
     * @return StreamInterface
     */
    private function makeHttpRequest(): StreamInterface
    {
        try {
            return $this->client->{$this->method}(
                $this->apiUrl,
                $this->options
            )->getBody();
        } catch (HttpClientException $e) {
            throw new RuntimeException($e->getRequest()->getBody().' '.$e->getResponse()->getBody());
        }
    }

    /**
     * Function To Perform Ininal API Request.
     *
     * @param bool $decode
     *
     * @throws \Throwable
     *
     * @return array|StreamInterface|string
     */
    private function doIninalRequest(bool $decode = true)
    {
        try {

            $this->apiUrl = collect([$this->config['api_url'], $this->apiEndPoint])->implode('/');

            // Perform Ininal HTTP API request.
            $response = $this->makeHttpRequest();

            return ($decode === false) ? $response->getContents() : Utils::jsonDecode($response, true);
        } catch (RuntimeException $t) {
            $message = collect($t->getMessage())->implode('\n');
        }

        return [
            'type'    => 'error',
            'message' => $message,
        ];
    }
}

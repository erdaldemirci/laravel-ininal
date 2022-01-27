<?php

namespace ErdalDemirci\Ininal\Traits\IninalAPI;

trait Authorization
{
    /**
     * Access Token.
     *
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/authentication#operation/v2-oauth-accesstoken
     */
    public function accessToken()
    {
        $this->apiEndPoint = "v2/oauth/accesstoken";

        $this->authorization = "Basic " . base64_encode($this->config['api_key'] . ":" . $this->config['api_secret']);

        $this->method = 'post';

        $response = $this->doIninalRequest();

        if (isset($response['accessToken'])) {
            $this->setAccessToken($response);

        }

        return $response;
    }


    private function setAccessToken(array $response)
    {
        $this->access_token = $response['accessToken'];

        $this->authorization = "{$response['tokenType']} {$this->access_token}";
    }

}

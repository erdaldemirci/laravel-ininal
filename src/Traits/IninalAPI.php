<?php

namespace ErdalDemirci\Ininal\Traits;

trait IninalAPI
{
    use IninalAPI\Authorization;
    use IninalAPI\Users;
    use IninalAPI\Cards;
    use IninalAPI\Transactions;

    /**

    public function getAccessToken()
    {
        $this->apiEndPoint = 'v2/oauth/accesstoken';

        $this->authorization =


        $this->setRequestHeader();

        $response = $this->doIninalRequest();


        if (isset($response['accessToken'])) {
            $this->setAccessToken($response);

        }

        return $response;
    }


    public function setAccessToken(array $response)
    {
        $this->access_token = $response['accessToken'];

        $this->options['headers']['Authorization'] = "{$response['tokenType']} {$this->access_token}";
    }
     * */

}

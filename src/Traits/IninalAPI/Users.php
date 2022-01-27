<?php

namespace ErdalDemirci\Ininal\Traits\IninalAPI;

trait Users
{
    /**
     * User Creation.
     *
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users
     */
    public function userCreation(array $data)
    {
        $this->apiEndPoint = "v2/users";

        $this->options['json'] = $data;

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * User information.
     *
     * @param string $user_token
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users-usertoken
     */
    public function userInformation(string $user_token)
    {
        $this->apiEndPoint = "v2/users/{$user_token}";

        $this->method = 'get';

        return $this->doIninalRequest();
    }

    /**
     * Sending One-Time Password.
     *
     * @param string $user_token
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users-usertoken-send-otp
     */
    public function sendOTP(string $user_token)
    {
        $this->apiEndPoint = "v2/users/{$user_token}/send/otp";

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * One Time Password Authentication.
     *
     * @param string $user_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users-usertoken-send-otp
     */
    public function verifyOTP(string $user_token, array $data)
    {
        $this->apiEndPoint = "v2/users/{$user_token}/verify/otp";

        $this->options['json'] = $data;

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * Virtual Card Creation.
     *
     * @param string $user_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users-usertoken-cards-virtual
     */
    public function virtualCardCreation(string $user_token, array $data)
    {
        $this->apiEndPoint = "v2/users/{$user_token}/cards/virtual";

        $this->options['json'] = $data;

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * Card Personalization.
     *
     * @param string $user_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users-usertoken-cards-attach
     */
    public function cardPersonalization(string $user_token, array $data)
    {
        $this->apiEndPoint = "v2/users/{$user_token}/cards/attach";

        $this->options['json'] = $data;

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * User Card Information.
     *
     * @param string $user_token
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users-usertoken-cards
     */
    public function userCardInformation(string $user_token)
    {
        $this->apiEndPoint = "v2/users/{$user_token}/cards";

        $this->method = 'get';

        return $this->doIninalRequest();
    }

    /**
     * Gsm Number Update for Unverified User.
     *
     * @param string $user_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/users#operation/v2-users-usertoken-gsmnumber
     */
    public function gsmNumberUpdateforUnverifiedUser(string $user_token,array $data)
    {
        $this->apiEndPoint = "v2/users/{$user_token}/cards";

        $this->options['json'] = $data;

        $this->method = 'put';

        return $this->doIninalRequest();
    }

}

<?php

namespace ErdalDemirci\Ininal\Traits\IninalAPI;

trait Cards
{
    /**
     * Card Information.
     *
     * @param string $card_token
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-cardtoken
     */
    public function cardInformation(string $card_token)
    {
        $this->apiEndPoint = "v2/cards/{$card_token}";

        $this->method = 'get';

        return $this->doIninalRequest();
    }

    /**
     * Anonymous Virtual Card Creation.
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-virtual
     */
    public function anonymousVirtualCardCreation()
    {
        $this->apiEndPoint = "v2/cards/virtual";

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * Card Status Update.
     *
     * @param string $card_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-cardtoken-status
     */
    public function cardStatusUpdate(string $card_token, array $data)
    {
        $this->apiEndPoint = "v2/cards/{$card_token}/status";

        $this->options['json'] = $data;

        $this->method = 'put';

        return $this->doIninalRequest();
    }

    /**
     * Card Balance View.
     *
     * @param string $card_token
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-cardtoken-balance
     */
    public function cardBalanceView(string $card_token)
    {
        $this->apiEndPoint = "v2/cards/{$card_token}/balance";

        $this->method = 'get';

        return $this->doIninalRequest();
    }

    /**
     * Card Password Transactions.
     *
     * @param string $card_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-cardtoken-pin
     */
    public function cardPasswordTransactions(string $card_token, array $data)
    {
        $this->apiEndPoint = "v2/cards/{$card_token}/pin";

        $this->options['json'] = $data;

        $this->method = 'put';

        return $this->doIninalRequest();
    }

    /**
     * Viewing Card Transactions.
     *
     * @param string $card_token
     * @param string $start_date
     * @param string $end_date
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-cardtoken-transactions-startdate-enddate
     */
    public function viewingCardTransactions(string $card_token, string $start_date, string $end_date)
    {
        $this->apiEndPoint = "v2/cards/{$card_token}/transactions/{$start_date}/{$end_date}";

        $this->method = 'get';

        return $this->doIninalRequest();
    }

    /**
     * Balance Transfer Initiation.
     *
     * @param string $source_card_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-sourcecardtoken-pretransfer
     */
    public function balanceTransferInitiation(string $source_card_token, array $data)
    {
        $this->apiEndPoint = "v2/cards/{$source_card_token}/transfer";

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * Balance Transfer Completion.
     *
     * @param string $source_card_token
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/cards#operation/v2-cards-sourcecardtoken-transfer
     */
    public function balanceTransferCompletion(string $source_card_token, array $data)
    {
        $this->apiEndPoint = "v2/cards/{$source_card_token}/transfer";

        $this->method = 'put';

        return $this->doIninalRequest();
    }

}

<?php

namespace ErdalDemirci\Ininal\Traits\IninalAPI;

trait Transactions
{
    /**
     * Balance Loading.
     *
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/xactions#operation/v2-transactions-in
     */
    public function balanceLoading(array $data)
    {
        $this->apiEndPoint = "v2/transactions/in";

        $this->options['json'] = $data;

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * Balance Load Cancel.
     *
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/xactions#operation/v2-transactions-in-cancel
     */
    public function balanceLoadCancel(array $data)
    {
        $this->apiEndPoint = "v2/transactions/in/cancel";

        $this->options['json'] = $data;

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * Starting a Collection Process.
     *
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/xactions#operation/provision
     */
    public function startingCollectionProcess(array $data)
    {
        $this->apiEndPoint = "v2/transactions/out";

        $this->options['json'] = $data;

        $this->method = 'post';

        return $this->doIninalRequest();
    }

    /**
     * Completing the Collection Process.
     *
     * @param string $provision_code
     * @param array $data
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/xactions#operation/transactionsCollect
     */
    public function completingCollectionProcess(string $provision_code, array $data)
    {
        $this->apiEndPoint = "v2/transactions/{$provision_code}/out";

        $this->options['json'] = $data;

        $this->method = 'put';

        return $this->doIninalRequest();
    }

    /**
     * Nearest Sales and Loading Points.
     *
     * @param string $coordinateY
     * @param string $coordinateX
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.ininal.com/xactions#operation/provision
     */
    public function nearestSalesLoadingPoints(string $coordinateY, string $coordinateX)
    {
        $this->apiEndPoint = "v2/transactions/locations/{$coordinateY}/{$coordinateX}";

        $this->method = 'post';

        return $this->doIninalRequest();
    }

}

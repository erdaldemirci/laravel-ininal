<?php

namespace ErdalDemirci\Ininal;

use Exception;
use ErdalDemirci\Ininal\Services\Ininal as IninalClient;

class IninalFacadeAccessor
{
    /**
     * Ininal API provider object.
     *
     * @var
     */
    public static $provider;

    /**
     * Get specific Ininal API provider object to use.
     *
     * @return \ErdalDemirci\Ininal\Services\Ininal
     *@throws Exception
     *
     */
    public static function getProvider()
    {
        return self::$provider;
    }

    /**
     * Set Ininal API Client to use.
     *
     * @return \ErdalDemirci\Ininal\Services\Ininal
     *@throws \Exception
     *
     */
    public static function setProvider()
    {
        // Set default provider. Defaults to ExpressCheckout
        self::$provider = new IninalClient();

        return self::getProvider();
    }
}

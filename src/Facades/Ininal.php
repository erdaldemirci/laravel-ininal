<?php

namespace ErdalDemirci\Ininal\Facades;

/*
 * Class Facade
 * @package ErdalDemirci\Ininal\Facades
 * @see ErdalDemirci\Ininal\ExpressCheckout
 */

use Illuminate\Support\Facades\Facade;

class Ininal extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ErdalDemirci\Ininal\IninalFacadeAccessor';
    }
}

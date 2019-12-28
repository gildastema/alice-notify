<?php

namespace Tematech\AliceNotify;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tematech\AliceNotify\Skeleton\SkeletonClass
 */
class AliceNotifyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AliceNotify::class;
    }
}

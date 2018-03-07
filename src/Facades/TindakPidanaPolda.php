<?php

namespace Bantenprov\TindakPidanaPolda\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The TindakPidanaPolda facade.
 *
 * @package Bantenprov\TindakPidanaPolda
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class TindakPidanaPoldaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tindak-pidana-polda';
    }
}

<?php

namespace Bantenprov\TindakPidanaPolda\Http\Middleware;

use Closure;

/**
 * The TindakPidanaPoldaMiddleware class.
 *
 * @package Bantenprov\TindakPidanaPolda
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class TindakPidanaPoldaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}

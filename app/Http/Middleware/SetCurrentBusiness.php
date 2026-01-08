<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCurrentBusiness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->check() && auth()->user()->current_business_id) {
            app()->instance(
                'currentBusiness',
                auth()->user()->businesses()
                    ->where('business_id', auth()->user()->current_business_id)
                    ->first()
            );
        }


        return $next($request);
    }
}

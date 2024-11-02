<?php

namespace App\Ship\Middlewares;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Locale Middleware using http header parameter of "locale"
     * 
     * @param Request $request
     * @param Closure $next
     * @return void
     */
    public function handle(Request $request, Closure $next)
    {
        if(! $request->user()) {
            return $next($request);
        }
        
        $language = $request->header('locale');

        if (!empty($language)) {
            app()->setLocale($language);
        }
 
        return $next($request);
    }
}

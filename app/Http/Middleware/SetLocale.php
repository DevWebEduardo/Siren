<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the locale is stored in the session
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
        } else {
            // If the locale is not in the session, use the app default or any other fallback logic
            $locale = config('app.locale');
        }
    
        // Set the locale in the config
        app()->setLocale($locale);
    
        return $next($request);
    }
}

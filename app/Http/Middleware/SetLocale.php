<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App as AppFacade;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->get('locale') ?: $request->session()->get('locale') ?: config('app.locale');
        if (!in_array($locale, ['en', 'my'])) {
            $locale = config('app.locale');
        }

        AppFacade::setLocale($locale);
        $request->session()->put('locale', $locale);

        return $next($request);
    }
}

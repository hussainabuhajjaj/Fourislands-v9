<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Resolve the application locale at request time instead of route
 * registration time.
 *
 * The localized route group uses an optional "{locale?}" prefix so the route
 * table is identical for every locale and can be cached safely. This
 * middleware applies the matched locale to the app/translator and tells the
 * URL generator which locale value to use when building localized URLs.
 */
class SetLocaleFromRoute
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route()?->parameter('locale');

        if (! is_string($locale) || ! array_key_exists($locale, LaravelLocalization::getSupportedLocales())) {
            $locale = LaravelLocalization::getDefaultLocale();
        }

        // Read this before setLocale(): Application::setLocale() also updates
        // the app.locale config value.
        $defaultLocale = LaravelLocalization::getDefaultLocale();

        LaravelLocalization::setLocale($locale);

        // Keep generated URLs canonical: the default locale has no prefix.
        // A null default (rather than '') is required so the URL generator
        // drops the placeholder instead of appending "?locale=" to the URL.
        URL::defaults([
            'locale' => $locale === $defaultLocale ? null : $locale,
        ]);

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(self)');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');
        $response->headers->set('Cross-Origin-Resource-Policy', 'same-origin');

        if ($request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        $response->headers->set(
            'Content-Security-Policy-Report-Only',
            "default-src 'self'; " .
            "base-uri 'self'; " .
            "form-action 'self'; " .
            "frame-ancestors 'self'; " .
            "object-src 'none'; " .
            "img-src 'self' data: https:; " .
            "font-src 'self' data: https://fonts.gstatic.com https://cdnjs.cloudflare.com; " .
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com https://api.mapbox.com; " .
            "script-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://api.mapbox.com; " .
            "connect-src 'self' https://api.mapbox.com https://events.mapbox.com"
        );

        return $response;
    }
}

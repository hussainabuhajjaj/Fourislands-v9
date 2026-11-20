<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\NewsletterController;
use App\Http\Controllers\Front\MailController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\QuoteRequestController;
use Illuminate\Support\Facades\Response;

Route::get('image/{folder}/{path}/{size?}', [MediaController::class, 'photo']);
Route::get('/sitemap.xml', function () {
    $paths = [
        '/',
        '/about',
        '/services',
        '/products',
        '/faq',
        '/contacts',
        '/quote-request',
        '/blog',
        '/thank-you',
    ];

    $urls = [];
    foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
        foreach ($paths as $path) {
            $urls[] = url($locale . ($path === '/' ? '' : $path));
        }
    }

    $services = \App\Models\Service::translatedIn('en')->get();
    foreach ($services as $s) {
        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $urls[] = url($locale . '/services/' . $s->id . '/services');
        }
    }

    $products = \App\Models\Product::translatedIn('en')->get();
    foreach ($products as $p) {
        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $urls[] = url($locale . '/products/' . $p->id . '/products');
        }
    }

    $posts = \App\Models\Post::published()->translatedIn('en')->get();
    foreach ($posts as $post) {
        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $urls[] = url($locale . '/blog/' . $post->slug);
        }
    }

    $xml = view('sitemap', ['urls' => $urls])->render();

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
});
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe')->middleware('throttle:3,1');
Route::get('/unsubscribe/{email}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::get('/newsletter', [NewsletterController::class, 'welcome']);

// Cache-safe localized routes. The prefix is a placeholder resolved per
// request by App\Http\Middleware\SetLocaleFromRoute; it must never be the
// result of LaravelLocalization::setLocale() (that freezes one locale into
// the compiled route table, so route:cache would drop the other languages).
$supportedLocales = array_keys(config('laravellocalization.supportedLocales', []));

if ($supportedLocales !== []) {
    Route::pattern('locale', implode('|', $supportedLocales));
}

$localizedRoutes = function () {
    Route::group(['as' => 'home.'], function () {
        Route::get('/', [FrontController::class, 'home'])->name('home');
        Route::get('notification', [FrontController::class, 'notification']);
        Route::get('/send-welcome-mail', [MailController::class, 'sendNewsletter']);

        Route::get('/about', [AboutController::class, 'Index']);
        Route::get('/faq', [FaqController::class, 'index'])->name('faq');
        Route::get('/thank-you', function () {
            return view('frontend.thank-you');
        })->name('thank-you');

        Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('{id}/services', [ServiceController::class, 'show'])->name('show');
        });

        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('{id}/products', [ProductController::class, 'show'])->name('show');
        });

        Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            Route::post('/', [ContactController::class, 'store'])->name('store')->middleware('throttle:5,1');
        });

        Route::group(['prefix' => 'quote-request', 'as' => 'quote-requests.'], function () {
            Route::get('/', [QuoteRequestController::class, 'index'])->name('index');
            Route::post('/', [QuoteRequestController::class, 'store'])->name('store')->middleware('throttle:5,1');
        });

        Route::get('search', [SearchController::class, 'search'])->name('search');

        Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
            Route::get('/', [BlogController::class, 'index'])->name('index');
            Route::get('category/{slug}', [BlogController::class, 'category'])->name('category');
            Route::get('{slug}', [BlogController::class, 'show'])->name('show');
        });
    });
};

$localizedMiddleware = ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'];

// Default locale URLs have no prefix. These routes only exist so that
// /about, /products/... etc. can be matched; the "plain." name prefix keeps
// them from colliding with the canonical routes used by route() and by the
// route cache.
Route::group([
    'as' => 'plain.',
    'middleware' => $localizedMiddleware,
], $localizedRoutes);

// Locale-prefixed URLs. The {locale?} placeholder is filled at request time by
// App\Http\Middleware\SetLocaleFromRoute via URL::defaults(), so route('home.*')
// stays locale aware while the compiled route table is identical for every
// locale (which is what makes route:cache safe).
Route::group([
    'prefix' => '{locale?}',
    'middleware' => $localizedMiddleware,
], $localizedRoutes);

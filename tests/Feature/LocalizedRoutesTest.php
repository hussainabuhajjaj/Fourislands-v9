<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Guards the cache-safe localized route registration: one route table serves
 * every locale, the default locale stays unprefixed, and generated URLs follow
 * the active locale.
 */
class LocalizedRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function test_default_locale_urls_are_unprefixed(): void
    {
        $this->get('/')->assertOk();
        $this->get('/about')->assertOk();
        $this->get('/services')->assertOk();
        $this->get('/products')->assertOk();
    }

    public function test_arabic_urls_are_prefixed(): void
    {
        $this->get('/ar')->assertOk();
        $this->get('/ar/about')->assertOk();
        $this->get('/ar/services')->assertOk();
        $this->get('/ar/products')->assertOk();
    }

    public function test_explicit_default_locale_prefix_redirects(): void
    {
        $this->get('/en/about')->assertRedirect('/about');
    }

    public function test_explicit_default_locale_home_redirects(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(302);
        $this->assertSame('/', parse_url($response->headers->get('Location'), PHP_URL_PATH));
    }

    public function test_generated_urls_follow_the_active_locale(): void
    {
        $this->get('/ar');

        $this->assertSame(
            url('/ar/products/1/products'),
            route('home.products.show', ['id' => 1])
        );

        $this->get('/');

        $this->assertSame(
            url('/products/1/products'),
            route('home.products.show', ['id' => 1])
        );

        $this->assertStringNotContainsString('?locale=', route('home.products.show', ['id' => 1]));
    }

    public function test_spanish_urls_are_prefixed(): void
    {
        $this->get('/es')->assertOk();
        $this->get('/es/about')->assertOk();
    }
}

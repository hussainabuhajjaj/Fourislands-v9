<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Baseline smoke tests used to compare behaviour before and after a
 * framework upgrade. These do not assert business rules - only that the
 * public surface still responds correctly.
 */
class SmokeTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function test_health_endpoint_responds(): void
    {
        $this->get('/up')->assertOk();
    }

    public function test_home_page_responds(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_sitemap_responds_as_xml(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml');
    }

    public function test_panel_login_page_responds(): void
    {
        $this->get('/panel/login')->assertOk();
    }

    public function test_panel_root_redirects_to_login(): void
    {
        $this->get('/panel')->assertRedirect('/panel/login');
    }

    public function test_api_user_requires_authentication(): void
    {
        $this->getJson('/api/user')->assertUnauthorized();
    }
}

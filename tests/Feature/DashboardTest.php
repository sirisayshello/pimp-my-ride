<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_view_dashboard_user_not_logged_in()
    {
        $response = $this->get('dashboard');

        $response->assertRedirect('/');
    }
}

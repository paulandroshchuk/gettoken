<?php

namespace Tests\Feature\Web\Dashboard;

use App\Models\User;
use Tests\Feature\Garage\WebTestCase;

class ViewDashboardTest extends WebTestCase
{
    /** @test */
    function guests_cannot_see_the_dashboard_page()
    {
        $this->assertGuest();

        $this->get(route('dashboard.index'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function user_sees_the_dashboard_page()
    {
        $this->actingAs(factory(User::class)->create());

        $this->get(route('dashboard.index'))
            ->assertSuccessful()
            ->assertViewIs('dashboard.index');
    }
}

<?php

namespace Tests\Feature\Api\Organizations;

use Tests\Feature\Garage\ApiTestCase;

class ViewOrganizationsTest extends ApiTestCase
{
    /** @test */
    function guest_cannot_view_organizations()
    {
        $this->assertGuest('api');

        $this->getJson(url('/api/v1/organizations'))
            ->assertStatus(401)
            ->assertUnauthenticated('api');
    }

    /** @test */
    function user_can_view_organizations()
    {
        $this->actingAs($this->createUser(), 'api')
            ->getJson(url('/api/v1/organizations'))
            ->assertStatus(200);
    }
}

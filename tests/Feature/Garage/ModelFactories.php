<?php

namespace Tests\Feature\Garage;

use App\Models\User;

trait ModelFactories
{
    /**
     * Create User.
     */
    public function createUser(array $data = []): User
    {
        return factory(User::class)->create($data);
    }
}

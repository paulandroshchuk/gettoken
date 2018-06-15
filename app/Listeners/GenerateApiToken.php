<?php

namespace App\Listeners;

use App\Models\User;

class GenerateApiToken
{
    /**
     * Generate an API token for a new user.
     *
     * @param User $user
     */
    public function handle(User $user): void
    {
        $user->api_token = str_random(32);
    }
}

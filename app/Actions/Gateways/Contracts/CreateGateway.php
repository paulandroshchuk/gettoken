<?php

namespace App\Actions\Gateways\Contracts;

use App\Models\Gateway;
use App\Models\User;

interface CreateGateway
{
    /**
     * Create a new Gateway. Tie the Gateway with the User.
     *
     * @param User $user
     * @param array $data
     * @return Gateway
     */
    public function handle(User $user, array $data): Gateway;
}



<?php

namespace App\Policies;

use App\Models\Gateway;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GatewayPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the User is able to delete the Gateway.
     *
     * @param User $user
     * @param Gateway $gateway
     * @return bool
     */
    public function delete(User $user, Gateway $gateway)
    {
        return $user->is($gateway->user);
    }
}

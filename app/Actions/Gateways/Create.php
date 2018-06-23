<?php

namespace App\Actions\Gateways;

use App\Actions\Gateways\Contracts\CreateGateway;
use App\Models\Gateway;
use App\Models\User;

class Create implements CreateGateway
{
    /**
     * Create a new Gateway. Tie the Gateway with the User.
     *
     * @param User $user
     * @param array $data
     * @return Gateway
     */
    public function handle(User $user, array $data): Gateway
    {
        $gateway = new Gateway();
        $gateway->user()->associate($user);
        $gateway->name = $data['name'];
        $gateway->address = $data['address'];
        $gateway->save();

        return $gateway;
    }
}

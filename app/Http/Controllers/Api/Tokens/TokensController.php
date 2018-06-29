<?php

namespace App\Http\Controllers\Api\Tokens;

use App\Http\Requests\Tokens\CreateTokenRequest;
use App\Http\Resources\Token\TokenResource;
use App\Models\Gateway;
use App\Http\Controllers\Controller;

class TokensController extends Controller
{
    /**
     * Create & Send a token.
     *
     * @param CreateTokenRequest $request
     * @param Gateway $tokenGateway
     * @return TokenResource
     */
    public function store(CreateTokenRequest $request, Gateway $tokenGateway)
    {
        $token = $tokenGateway->send($request->validated());

        return new TokenResource($token);
    }
}

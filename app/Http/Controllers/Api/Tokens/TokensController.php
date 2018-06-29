<?php

namespace App\Http\Controllers\Api\Tokens;

use App\Http\Requests\Tokens\CreateTokenRequest;
use App\Http\Requests\VerifyTokenRequest;
use App\Http\Resources\Token\TokenResource;
use App\Models\Gateway;
use App\Http\Controllers\Controller;
use App\Models\Token;

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

    /**
     * Verify if a token is valid.
     *
     * @param VerifyTokenRequest $verifyTokenRequest
     * @param Gateway $tokenGateway
     * @param Token $someToken
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function verify(VerifyTokenRequest $verifyTokenRequest, Gateway $tokenGateway, Token $someToken)
    {
        $someToken->use();

        return response()->json([], 204);
    }
}

<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidTokenException;
use Illuminate\Foundation\Http\FormRequest;

class VerifyTokenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @throws InvalidTokenException
     */
    public function authorize()
    {
        $gateway = $this->route('tokenGateway');
        $token = $this->route('someToken');
        $user = $this->user();

        if ($user->isNot($gateway->getAttribute('user'))) {
            throw new InvalidTokenException('Invalid gateway provided.');
        }

        if ($token->getAttribute('gateway')->isNot($gateway)) {
            throw new InvalidTokenException('Invalid gateway provided.');
        }

        if ($token->getAttribute('used_at') !== null) {
            throw new InvalidTokenException('The token has been already used.');
        }

        if ($token->recipient()->where('type', $gateway->type)->where('address', $this->get('recipient'))->doesntExist()) {
            throw new InvalidTokenException('The recipient address is invalid.');
        }

        if (now()->subMinutes(5) > $token->getAttribute('created_at')) {
            throw new InvalidTokenException('The token has expired.');
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'recipient' => ['required', 'string'],
        ];
    }
}

<?php

namespace App\Actions\Gateways\Sms;

use App\Models\Gateway;
use App\Models\Recipient;
use App\Models\Token;
use Transistor;

class SendSmsToken
{
    /**
     * @var Gateway
     */
    protected $gateway;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var \App\Models\User
     */
    protected $user;

    /**
     * SendSmsToken constructor.
     * @param Gateway $gateway
     * @param array $data
     * @return Token
     */
    public function __invoke($gateway, array $data): Token
    {
        $this->gateway = $gateway;
        $this->data = $data;
        $this->user = $this->gateway->getRelationValue('user');

        return $this->handle();
    }

    /**
     * Create & Send a Token.
     *
     * @return Token
     */
    public function handle(): Token
    {
        $token = new Token();
        $token->recipient()->associate($this->getRecipient());
        $token->gateway()->associate($this->gateway);
        $token->token = $this->gateway->generateToken();
        $token->save();

        $this->send($token);

        return $token;
    }

    /**
     * @return Recipient
     */
    protected function getRecipient(): Recipient
    {
        return $this->user->recipients()->firstOrCreate([
            'type'    => 'sms',
            'address' => $this->data['recipient'],
        ]);
    }

    /**
     * Send the token.
     *
     * @param Token $token
     */
    protected function send(Token $token)
    {
        $response = Transistor::from('twilio', $this->gateway->address)->send($this->data['recipient'], $token->token);

        $token->gateway_feedback = $response->getId();
//        $token->status = 'SENT';
        $token->save(); 
    }
}

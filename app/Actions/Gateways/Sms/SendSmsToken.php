<?php

namespace App\Actions\Gateways\Sms;

use App\Models\Gateway;
use App\Models\Recipient;
use App\Models\Token;
use Ypl\Transistor\Contracts\Transistor;

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
     */
    public function __construct(Gateway $gateway, array $data)
    {
        $this->gateway = $gateway;
        $this->data = $data;
        $this->user = $this->gateway->getRelationValue('user');
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
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
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
        $token->save();
    }
}

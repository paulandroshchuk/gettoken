<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recipients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'address',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'type'    => 'string',
        'address' => 'string',
    ];

    /**
     * Get a list of Tokens have been sent to the Recipient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * @param $query
     * @param Gateway $gateway
     * @return mixed
     */
    public function scopeWhereGateway($query, $gateway)
    {
        return $query->where('type', $gateway->getAttribute('type'));
    }
}

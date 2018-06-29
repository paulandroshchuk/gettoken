<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gateways';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'type', 'address',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a token.
     *
     * @return string
     */
    public function generateToken()
    {
        return str_random(5);
    }

    /**
     * Create & Send a token.
     *
     * @param array $data
     * @return Token
     */
    public function send(array $data): Token
    {
        return app()
            ->make(sprintf('gateways.%s.send', $this->getAttribute('type')))($this, $data);
    }
}

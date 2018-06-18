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
}

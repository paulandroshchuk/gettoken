<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'interactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'recipient_id',
        'gateway_id',
        'code',
        'status',
        'gateway_feedback',
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
     * Get a recipient the Interaction has been sent to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }

    /**
     * Get a gateway the Interaction has been sent via.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gateway()
    {
        return $this->belongsTo(Gateway::class);
    }
}

<?php

namespace App\Http\Resources\Token;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status' => $this->getAttribute('status'),
            'recipient' => [
                'type'    => $this->getAttribute('recipient')->getAttribute('type'),
                'address' => $this->getAttribute('recipient')->getAttribute('address'),
            ],
            'gateway' => [
                'type' => $this->getAttribute('gateway')->getAttribute('type'),
                'name' => $this->getAttribute('gateway')->getAttribute('name'),
            ],
        ];
    }
}

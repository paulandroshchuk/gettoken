<?php

namespace App\Http\Requests\Gateways;

use Illuminate\Foundation\Http\FormRequest;

class CreateGatewayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name'    => ['required', 'string', 'unique:gateways,name'],
            'type'    => ['required', 'string', 'in:telegram'],
            'address' => ['required', 'string'],
        ];
    }
}

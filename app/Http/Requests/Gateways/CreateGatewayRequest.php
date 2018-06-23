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
            'name'    => ['required', 'alpha', 'min:3', 'max: 20', 'unique:gateways,name'],
            'type'    => ['required', 'string', 'in:sms'],
            'address' => ['required', 'string', 'in:+12185850143'],
        ];
    }
}

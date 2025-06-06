<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CondominiosRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'address_type' => 'required|string',
            'address_street' => 'required|string',
            'address_number' => 'required|string',
            'address_neighborhood' => 'required|string',
            'address_city' => 'required|string',
            'address_state' => 'required|string',
            'address_country' => 'required|string',
            'address_cep' => 'required|string',
            'responsible' => ['required', 'string', 'max:255'],
            'contact' => ['nullable', 'string', 'max:100'],
        ];
    }
}

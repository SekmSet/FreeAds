<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'pseudo' => [ 'string','nullable','max:10'],
            'telephone' => ['string','nullable','digits:10'],
            'sexe' => [ 'string','nullable','max:1'],
            'name' => ['string','nullable','min:2'],
            'email' => ['string','nullable','email:rfc,dns'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'profile_visibility.boolean'    => 'The profile visibility flag needs to be a boolean'
        ];
    }
}

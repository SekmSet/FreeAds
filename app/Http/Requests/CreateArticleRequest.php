<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'title' => ['string','required','min:4'],
            'price' => ['numeric','required'],
            'resum' => ['string','required','min:20'],
            'images' => 'required',
            'city' => ['string','required'],
            'color' => ['exists:App\Color,id'],
            'theme' => ['exists:App\Theme,id'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}

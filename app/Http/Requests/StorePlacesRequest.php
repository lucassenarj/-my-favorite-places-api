<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlacesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('api');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|required|max:50',
            'address' => 'required|max:255',
            'latitude' => 'required|max:15',
            'longitude' => 'required|max:15',
            'description' => 'max:255',
            'visited_at' => 'max:255',
            'shared' => 'boolean|required',
            'thumbnail' => 'max:255',
            'user_id' => 'integer|required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DietFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'food_preference' => ['required'],
            'allergies' => ['boolean'],
            'diet' => ['required'],
            'user_id' => ['required', 'exists:users'], //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

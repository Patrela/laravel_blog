<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $photo = request()->isMethod('PUT') ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000' : 'required|image';
        return [
            'full_name' => 'required|max:180',
            'email' => 'required|max:180',
            'photo' => $photo,
            'profession' => 'nullable|max:60',
            'about' => 'nullable|max:255',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
        ];
    }
}

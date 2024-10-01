<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //those lines for ignoring slug and images for PUT method
        $slug = request()->isMethod('PUT') ? 'required|unique:categories,slug,' . $this->id : 'required|unique:categories';
        $image = request()->isMethod('PUT') ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000' : 'required|image';
        return [
            'name' => 'required|min:3|max:15',
            'slug' => $slug,
            'image' => $image,
            'is_featured' => 'required|boolean',
            'status' => 'required|boolean',
        ];
    }
}

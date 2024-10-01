<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * returns true if the user is authorized in other places
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
        $slug = request()->isMethod('PUT') ? 'required|unique:articles,slug,' . $this->id : 'required|unique:articles';
        $image = request()->isMethod('PUT') ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000' : 'required|image';
        return [
            'title' => 'required|min:5|max:180',
            'slug' => $slug,
            'introduction' => 'required|min:10|max:255',
            'body' => 'required',
            'image' => $image,
            'status' => 'required|boolean',
            'category_id' => 'required|integer',
        ];
    }
}

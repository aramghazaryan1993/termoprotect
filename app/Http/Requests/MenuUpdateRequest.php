<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuUpdateRequest extends FormRequest
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
        return [
            'parent_id' => 'nullable|exists:menus,id',
            'langs.hy.title' => 'required|string|max:255',
            'langs.hy.slug' => 'required|string|max:255',
            'langs.ru.slug' => 'required|string|max:255',
            'langs.en.slug' => 'required|string|max:255',
            'langs.es.slug' => 'required|string|max:255',
            'langs.hy.seo_title' => 'nullable|string|max:255',
            'langs.hy.seo_description' => 'nullable|string',
            'langs.hy.seo_keyword' => 'nullable|string',
        ];
    }
}

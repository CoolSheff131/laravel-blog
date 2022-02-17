<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
    public function message()
    {
        return [
            'title.required' => 'Это поле нужно заполнить',
            'title.string' => 'Это поле должно быть строкой',
            'content.required' => 'Это поле нужно заполнить',
            'content.string' => 'Это поле должно быть строкой',
            'preview_image.required' => 'Это поле нужно заполнить',
            'preview_image.file' => 'Это поле должно быть файлом',
            'main_image.required' => 'Это поле нужно заполнить',
            'main_image.file' => 'Это поле должно быть файлом',
            'category_id.required' => 'Это поле нужно заполнить',
            'category_id.integer' => 'Это поле должно быть числом',
            'category_id.exists' => 'Это поле должно быть в БД',
            'tag_ids.array' => 'Это поле должно массивом',
        ];
    }
}

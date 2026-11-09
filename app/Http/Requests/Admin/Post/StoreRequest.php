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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Це поле необхідно заповнити',
            'title.string'=>'Дані повинні відповідати строковому типу',
            'preview_image.required'=>'Це поле необхідно заповнити',
            'preview_image.file'=>'Необхідно вибрати файл',
            'main_image.required'=>'Це поле необхідно заповнити',
            'main_image.file'=>'Необхідно вибрати файл',
            'category_id.required'=>'Це поле необхідно заповнити',
            'category_id.integer'=>'Id категорії повинно бути числом',
            'category_id.exists'=>'Id категорії повинно бути в базі даних',
            'tag_ids.array'=>'Необхідно відправити масив даних',
        ];
    }
}



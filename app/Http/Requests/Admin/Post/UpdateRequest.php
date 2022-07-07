<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'         => 'required|string',
            'content'       => 'required|string',
            'preview_image' => 'file',
            'main_image'    => 'file',
            'category_id'   => 'integer|exists:categories,id',
            'tag_ids'       => 'nullable|array',
            'tag_ids.*'     => 'integer|exists:tags,id'
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'    => 'Поле "Имя поста" должно быть заполнено!',
            'content.required'  => 'Поле "Текст поста" должно быть заполнено!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SavePostRequest extends FormRequest
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
            'title' => [
                'required',
                'min:3'
            ],
            'content' => "min:10",
            'author'  => 'required',
            'short_desc' => [
                'required',
                //  'max:2000'
            ]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Hãy nhập tiêu đề",
            'title.min' => "Ít nhất có 3 ký tự",
            'content.min' => "Ít nhất có 10 ký tự",
            'author.required' => 'Hãy nhập tác giả',
            'short_desc.required' => 'Hãy nhập mô tả ngắn',
        ];
    }
}

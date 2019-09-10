<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStore extends FormRequest
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
            'title' => 'required|string|min:6',
            'image' => 'required|mimes:jpeg,png,bmp,gif,svg,jpg',
            'description' => 'required|string|min:6',
            'content' => "required|string|min:6",
            'status' => "required|numeric",
        ];
    }

    public function messages()
    {
        return $messages = [
            'required' => 'Trường :Attribute không được để trống',
            'string' => 'Trường :Attribute là kiểu chữ',
            'min' => 'Trường :Attribute ít nhất :min ký tự',
            'max' => 'Trường :Attribute nhiều nhất :max ký tự',
            'unique' => ':Attribute đã tồn tại',
            'mimes' => 'Không phải file ảnh',
        ];
    }
}

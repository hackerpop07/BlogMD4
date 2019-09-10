<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'name' => 'required|string|min:6|max:30',
            'phone' => 'required|regex:/(0)[0-9]{9}/|unique:users,phone',
            'age' => 'required|numeric',
            'image' => 'mimes:jpeg,png,bmp,gif,svg,jpg',
            'address' => 'required|string|min:6|max:255',
            //'date_of_birth' => 'required|before:today',
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
            'regex' => 'Hãy đền đúng định dạng :Attribute',
            'mimes' => 'Không phải file ảnh',
        ];
    }
}

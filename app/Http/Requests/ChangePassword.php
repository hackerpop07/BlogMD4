<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return $messages = [
            'required' => 'Trường :Attribute không được để trống',
            'string' => 'Trường :Attribute là kiểu chữ',
            'min' => 'Ít nhất :min ký tự',
            'confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ];
    }
}

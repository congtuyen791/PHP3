<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|min:6|email|max:32',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Tên bắt buộc nhập',
            'email.min' => 'Tên tối thiểu 6 ký tự',
            'email.max' => 'Tên tối đa 32 ký tự',
            'email.email' => 'Email phải đúng định dạng',
            'password.required' => 'Email bắt buộc nhập',
            'password.min' => 'Tên tối thiểu 6 ký tự',
        ];
    }
}

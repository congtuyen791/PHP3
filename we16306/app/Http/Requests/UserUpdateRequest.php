<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:15',
            'email' => 'required|email',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc nhập',
            'name.min' => 'Tên tối thiểu 2 ký tự',
            'name.max' => 'Tên tối đa 15 ký tự',
            'email.required' => 'Email bắt buộc nhập',
            'email.email' => 'Email phải đúng định dạng',
            'phone.required' => 'Số điện thoại bắt buộc nhập',
        ];
    }
}

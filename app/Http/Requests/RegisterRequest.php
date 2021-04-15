<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'email'=> [
                'required',
                'email',
                Rule::unique('users')->ignore($this->id),
            ],
            'password'=>[
                'required',
                'min:8',
                'confirmed',
            ],
            'name'=> 'required'
        ];
    }

    public function messages(){
        return [
            'email.required' => "Hãy nhập email",
            'email.email' => "Email không đúng định dạng",
            'email.unique' => "Email đã tồn tại",
            'password.required'=>'Yêu cầu nhập password',
            'password.min'=>'Password tối thiểu 8 ký tự',
            'password.confirmed'=>'Vui lòng xác nhận mật khẩu',
            'name.required'=>'Hãy nhập tên'
        ];
    }
}

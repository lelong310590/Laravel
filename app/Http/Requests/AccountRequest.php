<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccountRequest extends Request
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
            'inputLoginName'       => 'required|unique:lar_users,user_login',
            'inputLoginEmail'      => 'required|unique:lar_users,user_email',
            'inputLoginLevel'      => 'required',
            'inputLoginPassword'   => 'required|min:6|max:30',
            'inputLoginRePassword' => 'same:inputLoginPassword',
        ];
    }

    public function messages()
    {
        return [
            'inputLoginName.required'     => 'Tên đăng nhập không được bỏ trống',
            'inputLoginName.unique'       => 'Tên đăng nhập này đã được sử dụng',
            'inputLoginEmail.required'    => 'Địa chỉ Email không được bỏ trống',
            'inputLoginEmail.unique'      => 'Địa chỉ Email này đã được sử dụng',
            'inputLoginLevel.required'    =>  'Phải chọn cấp độ cho tài khoản',
            'inputLoginPassword.required' => 'Mật khẩu không được bỏ trống',
            'inputLoginPassword.min'      => 'Độ dài mật khẩu từ 6 - 30 ký tự',
            'inputLoginPassword.max'      => 'Độ dài mật khẩu từ 6 - 30 ký tự',
            'inputLoginRePassword.same'   => 'Mật khẩu không trùng'
        ];
    }
}

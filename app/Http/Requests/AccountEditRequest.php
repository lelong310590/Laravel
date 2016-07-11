<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccountEditRequest extends Request
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
            'inputEditPassword'     => 'min:6|max:30',
            'inputEditRePassword'   => 'same:inputEditPassword'
        ];
    }

    public function messages()
    {
        return [
            'inputEditRePassword.same'  => 'Mật khẩu nhập lại không trùng khớp',
            'inputEditPassword.min'     => 'Độ dài mật khẩu từ 6 đến 30 ký tự',
            'inputEditPassword.max'     => 'Độ dài mật khẩu từ 6 đến 30 ký tự',
        ];
    }
}

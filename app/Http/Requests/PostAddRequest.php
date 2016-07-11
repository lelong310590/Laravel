<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostAddRequest extends Request
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
            'inputTitle'         => 'required',
            'inputSlug'          => 'unique:lar_posts,post_slug',
            'inputFeaturedImage' => 'mimes:jpeg,bmp,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'inputTitle.required'      => 'Tiêu đề bài viết không được bỏ trống',
            'inputSlug.unique'         => 'Chuỗi cho đường dẫn tĩnh này đã được sử dụng',
            'inputFeaturedImage.mimes' => 'Chỉ chấp nhận các định dạng JPEG, BMP, PNG, JPG'
        ];
    }
}

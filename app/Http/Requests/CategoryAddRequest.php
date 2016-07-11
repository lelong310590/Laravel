<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryAddRequest extends Request
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
            'inputCategoryName' => 'required|unique:lar_categories,category_name',
            'inputCategorySlug' => 'unique:lar_categories,category_slug'
        ];
    }

    public function messages()
    {
        return [
            'inputCategoryName.required'    => 'Tiêu đề chuyên mục không được bỏ trống',
            'inputCategoryName.unique'      => 'Danh mục này đã tồn tại',
            'inputCategorySlug.unique'      => 'Chuỗi cho đường dẫn tĩnh này đã tồn tại'
        ];
    }
}

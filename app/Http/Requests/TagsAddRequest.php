<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagsAddRequest extends Request
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
            'inputTagsName' => 'required|unique:lar_tags,tags_name',
            'inputTagsSlug' => 'unique:lar_tags,tags_slug'
        ];
    }

    public function messages()
    {
        return [
            'inputTagsName.required'    => 'Tên thẻ không được bỏ trống',
            'inputTagsName.unique'      => 'Tên thẻ này đã tồn tại',
            'inputTagsSlug.unique'             => 'Chuỗi cho đường dẫn tĩnh của thẻ đã tồn tại'
        ];  
    }
}

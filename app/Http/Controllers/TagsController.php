<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Http\Requests\TagsAddRequest;

use App\Http\Models\Tags;

use DateTime;

class TagsController extends Controller
{
    public function getListAddTags()
    {
    	$tags = new Tags;
    	$allTags = $tags->select('id', 'tags_name', 'tags_slug')->get()->toArray();
    	return view('dashboard.modules.tags.listadd', ['allTags' => $allTags]);
    }

    public function postAddTags(TagsAddRequest $request)
    {
    	$tags = new Tags;
    	$tags->tags_name	= $request->inputTagsName;

    	if (empty($request->inputTagsSlug)) :
    		$tags->tags_slug	= str_slug($request->inputTagsName);
    	else :
    		$tags->tags_slug	= str_slug($request->inputTagsSlug);
    	endif;

    	$tags->created_at		= new DateTime;

    	$tags->save();

    	return redirect()->route('getListAddTags')->with([
    		'flash_message'		=> 'Thêm thẻ Tag mới thành công'
    	]);
    }

    public function postDeleteMultiTags()
    {
    	$selectedIdArray = Input::get('tagsArray');
        Tags::wherein('id', $selectedIdArray)->delete();
        return redirect()->route('getListAddTags')->with([
            'flash_message' => 'Xóa thẻ Tag thành công'
        ]);
    }

    public function getDeleteSingleTag($id)
    {
    	$tags = new Tags;
        $tags->findOrFail($id)->delete();
        return redirect()->route('getListAddTags')->with([
            'flash_message' => 'Xóa thẻ Tag thành công'
        ]);
    }

    public function getEditTags($id)
    {
    	$tags = Tags::findOrFail($id)->toArray();
    	return view('dashboard.modules.tags.edit', ['tags'	=> $tags]);
    }

    public function postEditTags($id, Request $request)
    {
    	$tags = Tags::find($id);
    	if ($request->inputTagsName != $tags->toArray()['tags_name']) :
            $this->validate($request, 
                [
                    'inputTagsName' => 'unique:lar_tags,tags_name'
                ]
            );
            $tags->tags_name = $request->inputTagsName;
        endif;

        if ($request->inputTagsSlug != $tags->toArray()['tags_slug']) :
            $this->validate($request, 
                [
                    'inputTagsSlug' => 'unique:lar_tags,tags_slug'
                ]
            );
            $tags->tags_slug = $request->inputTagsSlug;
        endif;

        $tags->updated_at                = new DateTime;

        $tags->save();

        return redirect()->route('getEditTags', $request['tagsId'])->with([
            'flash_message' => 'Thẻ đã được cập nhật thành công'
        ]);
    }
}

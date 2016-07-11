<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Models\Taxonomies;
use Illuminate\Support\Facades\Input;
use DateTime;

class CategoryController extends Controller
{

    public function getListAddCategory()
    {
		$catData = Taxonomies::where('taxonomy_type','category')->get();
    	return view('dashboard.modules.categories.listadd', ['catData' => $catData]);
    }

    public function postAddCategory(CategoryAddRequest $request) 
    {
    	$category = new Taxonomies;

        $category->category_name = $request->inputCategoryName;

        // If Slug Field is empty, auto generate slug with Name field
        if ($request->inputCategorySlug != '') :
            $category->taxonomy_slug = str_slug($request->inputCategorySlug);
        else :
            $category->taxonomy_slug = str_slug($request->inputCategoryName);
        endif;

        if ($request->inputCategoryParentId != null && $request->inputCategoryParentId != 0) :
            $category->taxonomy_parent = $request->inputCategoryParentId;
        else :
            $category->taxonomy_parent = 0;
        endif;

        if ($request->inputCategorySeoTitle != '') :
            $category->taxonomy_seo_title = $request->inputCategorySeoTitle;
        endif;

        if ($request->inputCategoryKeyword != '') :
            $category->taxonomy_focus_keyword = $request->inputCategoryKeyword;
        endif;

        if ($request->inputCategoryMetaDesc != '') :
            $category->taxonomy_meta_description = $request->inputCategoryMetaDesc;
        endif;

        $category->updated_at = new DateTime;

        $category->save();

        return redirect()->route('getListAddCategory')->with([
            'flash_message' => 'Thêm chuyên mục mới thành công'
        ]);

    }

    public function postDelCategory()
    {
    	$selectedIdArray = Input::get('catArray');
        Taxonomies::wherein('id', $selectedIdArray)->delete();
        return redirect()->route('getListAddCategory')->with([
            'flash_message' => 'Xóa chuyên mục thành công'
        ]);
    }

    public function getDelSingleCat($id)
    {
        $cat = new Taxonomies;
        $cat->findOrFail($id)->delete();
        return redirect()->route('getListAddCategory')->with([
            'flash_message' => 'Xóa chuyên mục thành công'
        ]);
    }

    public function getEditCategory($id)
    {
        $cat     = Taxonomies::findOrFail($id)->toArray();
        $catData = Taxonomies::select('id', 'category_name','category_parent')->get()->toArray();
        return view('dashboard.modules.categories.edit', ['cat' => $cat, 'catData' => $catData]);
    }

    public function postEditCategory($id, Request $request)
    {
        $cat = Taxonomies::find($id);
        if ($request->inputCategoryName != $cat->toArray()['category_name']) :
            $this->validate($request, 
                [
                    'inputCategoryName' => 'unique:lar_categories,category_name'
                ]
            );
            $cat->taxonomyy_name = $request->inputCategoryName;
        endif;

        if ($request->inputCategorySlug != $cat->toArray()['category_slug']) :
            $this->validate($request, 
                [
                    'inputCategorySlug' => 'unique:lar_categories,category_slug'
                ]
            );
            $cat->taxonomy_slug = $request->inputCategorySlug;
        endif;

        $cat->taxonomy_parent           = $request->inputCategoryParentId;
        $cat->taxonomy_seo_title        = $request->inputCategorySeoTitle;
        $cat->taxonomy_focus_keyword    = $request->inputCategoryKeyword;
        $cat->taxonomy_meta_description = $request->inputCategoryMetaDesc;
        $cat->updated_at                = new DateTime;

        $cat->save();

        return redirect()->route('getEditCategory', $request['categoryId'])->with([
            'flash_message' => 'Chuyên mục đã được cập nhật thành công'
        ]);
    }

    public function postSearchCategory(Request $request)
    {
        $query = $request->searchCategory;
        $category = new Taxonomies;
        $cat = $category->where('taxonomy_type', 'category')->get()->toArray();
        $result = $category->where('taxonomy_type', 'category')->where('taxonomy_name', 'LIKE', '%'.$query.'%')->get();

        return view('dashboard.modules.categories.listadd', ['catData' => $result, 'allCat' => $cat]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Taxonomies;
use App\Http\Models\Post;
use App\Http\Requests;
use App\Http\Requests\PostAddRequest;
use DateTime, Auth, File;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
	public function getListPost()
	{
		$post = new Post;
		$postData = $post->all()->sortByDesc("updated_at");
		return view('dashboard.modules.post.list', ['postData' => $postData]);
	}
    public function getAddPost()
    {
    	$cat = Taxonomies::select('id', 'category_name', 'category_parent')->orderBy('updated_at', 'DESC')->get()->toArray();
    	return view('dashboard.modules.post.add', ['cat' => $cat]);
    }

    public function postAddPost(PostAddRequest $request)
    {
    	$post = new Post;
    	$tags = new Tags;

    	$post->post_name = $request->inputTitle; //Get post title

        // Get post Tags slug
    	if (isset($request->inputSlug) && !empty($request->inputSlug)) :

			// If Generated Slug is same in DB, auto add number to this
		    if (Tags::where('tags_slug',str_slug($request->inputSlug))->count() > 0)
		    {
			    $postedSlug = Tags::where('tags_slug',str_slug($request->inputSlug))->count();
			    $post->post_slug = str_slug($request->inputSlug).'_$postedSlug';
		    } else {
			    $post->post_slug = str_slug($request->inputSlug);
		    }
    	elseif (isset($request->inputSlug) && empty($request->inputSlug)) :
    		// Auto generate slug via post title
    		$post->post_slug = str_slug($request->inputTitle);
    	endif;

	    if (isset($request->inputContent) && !empty($request->inputContent))
	    {
		    $post->post_content = json_encode($request->inputContent);
	    }
        // Get post Category ID
        if (!empty(Input::get('postCatArr'))) :
            $post->post_category = base64_encode(serialize(Input::get('postCatArr')));
        else :
            $post->post_category = 1;
        endif;

	    $featuredImages = $request->file('inputFeaturedImage');
	    if (strlen($featuredImages) > 0) {
		    $filename = time().'.'.$featuredImages->getClientOriginalName();
		    $dt = new DateTime();
		    $destinationPath = public_path().'/upload/'.$dt->format('Y').'/'.$dt->format('m');
		    if (!File::exists($destinationPath))
		    {
				File::makeDirectory($destinationPath, 0775, true, true);
			    $featuredImages->move($destinationPath,$filename);
			    $post->post_attachment = $filename;
		    } else {
			    $featuredImages->move($destinationPath,$filename);
			    $post->post_attachment = $filename;
		    }
	    }
        // Get Seo Title
	    if (isset($request->inputSeoTitle) && !empty($request->inputSeoTitle)) {
		    $post->post_seo_title = $request->inputSeoTitle;
	    } else {
		    $post->post_seo_title = $request->inputTitle;
	    }

	    //Get Seo Keyword
	    $post->post_focus_keyword = $request->inputKeyword;

	    //Get Seo Meta
	    $post->post_meta_description = $request->inputMetaDesc;

	    $post->post_author = Auth::user()->id;
	    if (isset($request->inputStatus) && !empty($request->inputStatus))
	    {
			if ($request->inputStatus == 'public') {
				$post->post_status = 1;
			}elseif ($request->inputStatus == 'draft'){
				$post->post_status = 0;
			}
	    }
	    $post->created_at = new DateTime();

	    $post->save();


    	return redirect()->route('getListPost')->with([
		    'flash_message' => 'Thêm tin tức thành công'
	    ]);
    }

}

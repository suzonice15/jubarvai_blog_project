<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Image;

use  Session;
use Webp;
use AdminHelper;
use URL;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        //echo Admin::SayHello();


    }

    public function index()
    {
        $user_id = AdminHelper::Admin_user_autherntication();
        $url = URL::current();

        if ($user_id < 1) {
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect', $url)->send();

        }


        $data['main'] = 'Posts';
        $data['active'] = 'All Posts';
        $data['title'] = '  ';
        $products = DB::table('post')->orderBy('post.post_id', 'desc')->paginate(10);

        return view('admin.post.index', compact('products'), $data);
    }

    public function pagination(Request $request)
    {
        if ($request->ajax()) {

            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $products = DB::table('post')

                ->where('post_title', 'LIKE', '%' . $query . '%')
                ->orWhere('post_name', 'LIKE', '%' . $query . '%')
                ->orderBy('post.post_id', 'desc')->paginate(10);
            return view('admin.post.pagination', compact('products'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = AdminHelper::Admin_user_autherntication();
        $url = URL::current();

        if ($user_id < 1) {
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect', $url)->send();

        }





        $data['main'] = 'Posts';
        $data['active'] = 'Add New Product';
        $data['title'] = '  ';
        $data['categories'] = DB::table('category')->orderBy('category_id', 'ASC')->get();
        return view('admin.post.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');

        $media_path = 'uploads/' . $request->folder;
        $orginalpath = public_path() . '/uploads/' . $request->folder;
        $small = $orginalpath . '/' . 'small';
        $thumb = $orginalpath . '/' . 'thumb';


        File::makeDirectory($small, $mode = 0777, true, true);
        File::makeDirectory($thumb, $mode = 0777, true, true);


        $data['post_title'] = $request->post_title;
        $data['folder'] = $request->folder;
        $data['post_description'] = $request->post_description;
        $data['post_name'] = $request->post_name;
        $data['status'] = $request->status;
        $data['user'] = Session::get('name');
        $data['created_time'] = date('Y-m-d H:i:s');
        $data['modified_time'] = date('Y-m-d H:i:s');
        $data['seo_title'] = $request->seo_title;
        $data['seo_keywords'] = $request->seo_keywords;
        $data['seo_content'] = $request->seo_content;
        $product_id = DB::table('post')->insertGetId($data);


        $featured_image_orgianal = $request->file('featured_image');

        if ($featured_image_orgianal) {

            // $image_name = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image = $product_id . '.' . $featured_image_orgianal->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_image = Image::make($featured_image_orgianal->getRealPath());
            $resize_image->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $featured_image);

            $resize_image->resize(200, 200, function ($constraint) {

            })->save($thumb . '/' . $featured_image);

            $image_row_data['feasured_image'] = $featured_image;



        }

        DB::table('post')->where('post_id', $product_id)->update($image_row_data);

        $row_data['post_id']=$product_id;

        $category_id = $request->category_id;
        if($category_id) {
            foreach ($category_id as $key => $cat) {
                $category_data['post_id'] = $product_id;
                $category_data['category_id'] = $cat;
                DB::table('post_category_relation')->insert($category_data);

            }
        }
        if ($product_id) {
            return redirect('admin/posts')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/post/create')
                ->with('error', 'No successfully.');
        }

    }



    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['product'] = DB::table('post')->where('post.post_id', $id)->first();
        $data['main'] = 'Posts';
        $data['active'] = 'Update Products';
        $data['title'] = 'Update User Registration Form';
        $data['categories'] = DB::table('category')->orderBy('category_id', 'ASC')->get();
        $data['product_categories'] = DB::table('post_category_relation')->where('post_id', $id)->orderBy('post_id', 'ASC')->get();


        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $product_row = DB::table('post')

            ->where('post.post_id', $product_id)->first();


        date_default_timezone_set('Asia/Dhaka');

        $media_path = 'uploads/' . $request->folder;
        $orginalpath = public_path() . '/uploads/' . $request->folder;
        $small = $orginalpath . '/' . 'small';
        $thumb = $orginalpath . '/' . 'thumb';
        $data['user'] = Session::get('name');

        $data['post_title'] = $request->post_title;
        $data['folder'] = $request->folder;
        $data['post_name'] = $request->post_name;
        $data['post_description'] = $request->post_description;
         $data['status'] = $request->status;
        $data['created_time'] = date('Y-m-d H:i:s');
        $data['modified_time'] = date('Y-m-d H:i:s');
        $data['seo_title'] = $request->seo_title;
        $data['seo_keywords'] = $request->seo_keywords;
        $data['seo_content'] = $request->seo_content;
        DB::table('post')->where('post_id', $product_id)->update($data);
        $featured_image_orgianal = $request->file('featured_image');
        if ($featured_image_orgianal) {

            $old_feature=$product_row->feasured_image;
            if($old_feature){
                $main_image=public_path().'/uploads/'.$product_row->folder.'/'.$old_feature;
                $small_image=public_path().'/uploads/'.$product_row->folder.'/small/'.$old_feature;
                $thumb_image=public_path().'/uploads/'.$product_row->folder.'/thumb/'.$old_feature;
              if(file_exists($main_image)){

                 @unlink($main_image);
                 @unlink($small_image);
                 @unlink($thumb_image);
              }

            }
          // exit();

            // $image_name = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image = $product_id . '.' . $featured_image_orgianal->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_image = Image::make($featured_image_orgianal->getRealPath());
            $resize_image->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $featured_image);

            $resize_image->resize(200, 200, function ($constraint) {

            })->save($thumb . '/' . $featured_image);

            $resize_image->resize(50, 50, function ($constraint) {

            })->save($small . '/' . $featured_image);
            $data['feasured_image'] = $featured_image;

        }

        DB::table('post')->where('post_id', $product_id)->update($data);
        //DB::table('product_relation')->where('product_id', $product_id)->update($row_data);
        DB::table('post_category_relation')->where('post_id', $product_id)->delete();

        $category_id = $request->category_id;
        foreach ($category_id as $key => $cat) {
            $category_data['post_id'] = $product_id;
            $category_data['category_id'] = $cat;
            DB::table('post_category_relation')->updateOrInsert($category_data);

        }


        if ($product_id) {
            return redirect('admin/posts')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/post/create')
                ->with('error', 'No successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_row = DB::table('post')->where('post_id', $id)->first();
        $folder=public_path('uploads/').$product_row->folder;
        File::deleteDirectory($folder);

        $result = DB::table('post')->where('post_id', $id)->delete();
         // DB::table('product_category_relation')->where('product_id', $id)->delete();
        if ($result) {
            return redirect('admin/posts')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/posts')
                ->with('error', 'No successfully.');
        }

    }

    public function urlCheck(Request $request)
    {
        $product_name = $request->get('url');
        $result = DB::table('post')->where('post_name', $product_name)->first();
        if ($result) {
            echo 'This product exit';
        } else {
            echo '';
        }
    }

    public function foldercheck(Request $request)
    {
        //  $product_name = $request->get('url');
        $result = DB::table('post')->orderby('post_id', 'desc')->first();
        if ($result) {
            $product_id = $result->post_id;
            $product_id = $product_id + 1;
            echo $product_id;
        } else {
            echo '1';
        }
    }
}

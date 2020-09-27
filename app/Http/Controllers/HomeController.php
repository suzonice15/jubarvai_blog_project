<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  Cart;
use Session;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function __construct()
    {



    }

    public function index()
    {

        $data['share_picture']=get_option('home_share_image');
        $data['seo_title']=get_option('home_seo_title');
        $data['seo_keywords']=get_option('home_seo_keywords');
        $data['seo_description']=get_option('home_seo_content');

        $data['posts']=DB::table('post')
            ->select('post_title','post_name','modified_time','user','folder','feasured_image')
            ->where('status',1)->orderBy('post_id','desc')->paginate(9);
        $data['sliders']=DB::table('homeslider')->select('homeslider_title','target_url','homeslider_picture','homeslider_text')->where('status',1)->get();
        $data['rights']=DB::table('right_add')->select('add_title','add_image','add_link')->get();
        $data['lefts']=DB::table('left_add')->get();
       return view('website.home',$data);
    }

    public  function blog(){
        $data['share_picture']=get_option('home_share_image');
        $data['seo_title']=get_option('home_seo_title');
        $data['seo_keywords']=get_option('home_seo_keywords');
        $data['seo_description']=get_option('home_seo_content');

        $data['posts']=DB::table('post')
            ->select('post_title','post_name','modified_time','user','folder','feasured_image')
            ->where('status',1)->orderBy('post_id','desc')->paginate(9);

        return view('website.blog',$data);
    }
    function homepagination(Request $request)
    {
        if($request->ajax())
        {
            $data['home_products'] = DB::table('product')->paginate(28);
            return view('website.home_page_ajax_category',$data)->render();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category_name)
    {


        $data['posts'] =DB::table('post')
           ->join('post_category_relation','post_category_relation.post_id','=','post.post_id')
            ->join('category','category.category_id','=','post_category_relation.category_id')
            ->where('post.status','=',1)
            ->where('category_name',$category_name)->orderBy('modified_time','DESC')->paginate(18);


        $post=DB::table('category')
            ->where('category_name',$category_name)->first();

        $data['share_picture']=get_option('home_share_image');
        $data['seo_title']= $post->seo_title;
        $data['seo_keywords']=$post->seo_keywords;
        $data['seo_description']=$post->seo_meta_content;
        $data['page_title']=$post->category_title;


$data['category_name']=$category_name;
        return view('website.category',$data);
     }
    public  function  ajax_category(Request $request){
        if($request->ajax())
        {

            $category_name = $request->get('category_name');
           // $query = str_replace(" ", "%", $query);
            $posts =DB::table('post')
                ->join('post_category_relation','post_category_relation.post_id','=','post.post_id')
                ->join('category','category.category_id','=','post_category_relation.category_id')
                ->where('post.status','=',1)
                ->where('category_name',$category_name)->orderBy('modified_time','DESC')->paginate(18);

            //  return view('website.category_ajax', compact('products'));
            $view = view('website.category_ajax',compact('posts'))->render();

            return response()->json(['html'=>$view]);
        }

    }
    public   function hot_home_product(){
        $data['products']=DB::table('product')->orderBy('modified_time','desc')->get();
        $view = view('website.hot_home_ajax_product',$data)->render();
        return response()->json(['html'=>$view]);
    }
    public function home_page_category_ajax(){
       // $data['products']=DB::table('product')->get();
        $view = view('website.home_page_ajax_category')->render();
        return response()->json(['html'=>$view]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post($product_name)
    {

        // $data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();
        $data['post']=DB::table('post')->select('*')
            ->where('post_name',$product_name)->first();
      $row_data['visitor'] = $data['post']->visitor+1;
        DB::table('post')->where('post_id',$data['post']->post_id)->update($row_data);


       // $product_id =$request->product_id;
        $data['share_picture']=get_option('home_share_image');
        $data['seo_title']= $data['post']->seo_title;
        $data['seo_keywords']=$data['post']->seo_keywords;
        $data['seo_description']=$data['post']->seo_content;
        $data['page_title']=$data['post']->post_title;


        $related_category= DB::table('post_category_relation')->select('category_id')
            ->join('post','post_category_relation.post_id','=','post.post_id')
            ->where('post_name',$product_name)->get();
        if ($related_category) {
            foreach ($related_category as $pcat) {
                $related_category_id[] = $pcat->category_id;
            }
            $related_category = $related_category_id;
        }
        $data['related'] =DB::table('post')
            ->select('post_title', 'post_name','feasured_image','folder')
            ->join('post_category_relation','post_category_relation.post_id','=','post.post_id')
            ->whereIn('category_id',$related_category)
          ->paginate(20);


        return view('website.post',$data);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public  function sohoj_admin(){
        Session::put('id', 1);
        Session::put('status', 'super-admin');
        Session::put('name', 'ddd');



            return redirect('dashboard');
    }
    public function search_engine(Request $request)
    {
        $search_query = $request->search_query;



        $search_query = str_replace(" ", "%", $search_query);
        $data['products'] = DB::table('product')->select('product_title','folder','feasured_image','product_price','sku','discount_price', 'product_name')->where('sku','LIKE','%'.$search_query.'%')
            ->orWhere('product_title','LIKE','%'.$search_query.'%')->paginate(10);
        $data['search_query']=$search_query;

        $view = view('website.search_engine',$data)->render();
        return response()->json(['html'=>$view]);



    }

    public  function search(Request $request){
        $search_query = $request->search;

        $search_query = str_replace(" ", "%", $search_query);
        $products= DB::table('product')->select('product_id','product_title','folder','feasured_image','product_price','sku','discount_price', 'product_name')->where('sku','LIKE','%'.$search_query.'%')
            ->orWhere('product_title','LIKE','%'.$search_query.'%')->get();
        if(count($products)==1){
            $product_url=url('/product').'/'.$products[0]->product_name;
          //  redirect($product_url;
            return redirect("$product_url");

        }
            return view('website.search', compact('products'));

    }

    public function sohoj_login(){
        $status ='super-admin';
        Session::put('id', 1);
        Session::put('status', $status);
        Session::put('name', 'alu');
        Session::put('picture', 'nai');


        return redirect('dashboard');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function track_order(Request $request)
    {
        if($request->mobile){
            $data['mobile']=$request->mobile;
           $data['order']= DB::table('order_data')->where('customer_phone',$request->mobile)->orderBy('order_id','desc')->first();

$data['mobile']=$request->mobile;

            return view('website.track_order_page',$data);
        } else {
            return view('website.track_order_page');
        }
    }
    public function page($url){
        $data['page']=DB::table('page')->select('*')->where('page_link',$url)->first();
        return view('website.page',$data);

    }
}

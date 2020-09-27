<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use AdminHelper;
use URL;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $data['main'] = 'Sliders';
        $data['active'] = 'All Sliders';
        $data['title'] = '  ';
        $data['sliders']=DB::table('homeslider')->orderBy('modified_time','desc')->get();
        return view('admin.slider.index', $data);
    }

    public function adds (){

        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $data['main'] = 'Right Add';
        $data['active'] = 'All Right add';
        $data['title'] = '  ';
        $data['sliders']=DB::table('right_add')->orderBy('right_add_id','desc')->get();
        return view('admin.slider.add_index', $data);
    }

    public function left_adds (){

        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $data['main'] = 'Left Add';
        $data['active'] = 'All Left add';
        $data['title'] = '  ';
        $data['adds']=DB::table('left_add')->orderBy('left_add_id','desc')->get();
        return view('admin.slider.left_add_index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $data['main'] = 'Sliders';
        $data['active'] = 'Add Slider';
        $data['title'] = 'User registration form';
        return view('admin.slider.create', $data);
    }
    public function add_create()
    {

        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $data['main'] = 'Right add ';
        $data['active'] = 'Right add';
        $data['title'] = 'User registration form';
        return view('admin.slider.add_create', $data);
    }

    public function left_add_create()
    {

        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $data['main'] = 'Right add ';
        $data['active'] = 'Right add';
        $data['title'] = 'User registration form';
        return view('admin.slider.left_add_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['homeslider_title'] = $request->homeslider_title;
        $data['target_url'] = $request->target_url;
        $data['status'] = $request->status;

        $data['created_time'] = date('Y-m-d');
        $data['modified_time'] = date('Y-m-d');
        $image = $request->file('slider_picture');
        if ($image) {

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/sliders');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->save($destinationPath . '/' . $image_name);


            $data['homeslider_picture'] = $image_name;
        }


        $result = DB::table('homeslider')->insert($data);
        if ($result) {
            return redirect('admin/sliders')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/sliders')
                ->with('error', 'No successfully.');
        }
    }


    public function add_store(Request $request)
    {
        $data['add_title'] = $request->add_title;
        $data['add_link'] = $request->add_link;

        $image = $request->file('add_image');
        if ($image) {

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/sliders');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->save($destinationPath . '/' . $image_name);


            $data['add_image'] = $image_name;
        }


        $result = DB::table('right_add')->insert($data);
        if ($result) {
            return redirect('admin/right/adds')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/right/adds')
                ->with('error', 'No successfully.');
        }
    }



    public function left_add_store(Request $request)
    {
        $data['add_title'] = $request->add_title;
        $data['promo_link'] = $request->promo_link;
        $data['add_link'] = $request->add_link;
        $data['add_slug'] = $request->add_slug;

        $image = $request->file('add_image');
        if ($image) {

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/sliders');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->save($destinationPath . '/' . $image_name);


            $data['add_image'] = $image_name;
        }


        $result = DB::table('left_add')->insert($data);
        if ($result) {
            return redirect('admin/left/adds')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/left/adds')
                ->with('error', 'No successfully.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['slider']=DB::table('homeslider')->where('homeslider_id',$id)->first();

        $data['main'] = 'Sliders';
        $data['active'] = 'Update Sliders';
        $data['title'] = 'Update Sliders Registration Form';
        return view('admin.slider.edit', $data);
    }

    public function add_edit($id)
    {
        $data['add']=DB::table('right_add')->where('right_add_id',$id)->first();

        $data['main'] = 'Right Add';
        $data['active'] = 'Update Sliders';
        $data['title'] = 'Update Sliders Registration Form';
        return view('admin.slider.add_edit', $data);
    }

    public function left_add_edit($id)
    {
        $data['add']=DB::table('left_add')->where('left_add_id',$id)->first();

        $data['main'] = 'Left Add';
        $data['active'] = 'Update Sliders';
        $data['title'] = 'Update Sliders Registration Form';
        return view('admin.slider.left_add_edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data['homeslider_title'] = $request->homeslider_title;
        $data['target_url'] = $request->target_url;
        $data['status'] = $request->status;
        $data['modified_time'] = date('Y-m-d');
        $image = $request->file('slider_picture');
        $old_picture= public_path('/uploads/sliders').'/'.$request->old_picture;

        if($image) {
            if(file_exists($old_picture)){

                unlink($old_picture);
            }
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/sliders');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->save($destinationPath . '/' . $image_name);
            $data['homeslider_picture']=$image_name;
        }
        $result= DB::table('homeslider')->where('homeslider_id',$id)->update($data);
        if ($result) {
            return redirect('admin/sliders')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/sliders')
                ->with('error', 'No successfully.');
        }


    }

    public function add_update(Request $request, $id)
    {

        $data['add_title'] = $request->add_title;
        $data['add_link'] = $request->add_link;

        $image = $request->file('add_image');
        $old_picture= public_path('/uploads/sliders').'/'.$request->old_picture;

        if($image) {

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/sliders');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->save($destinationPath . '/' . $image_name);
            $data['add_image']=$image_name;
        }
        $result= DB::table('right_add')->where('right_add_id',$id)->update($data);
        if ($result) {
            return redirect('admin/right/adds')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/right/adds')
                ->with('error', 'No successfully.');
        }


    }
    public function left_add_update(Request $request, $id)
    {

        $data['add_title'] = $request->add_title;
        $data['promo_link'] = $request->promo_link;
        $data['add_link'] = $request->add_link;
        $data['add_slug'] = $request->add_slug;

        $image = $request->file('add_image');
     //   $old_picture= public_path('/uploads/sliders').'/'.$request->old_picture;

        if($image) {

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/sliders');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->save($destinationPath . '/' . $image_name);
            $data['add_image']=$image_name;
        }
        $result= DB::table('left_add')->where('left_add_id',$id)->update($data);
        if ($result) {
            return redirect('admin/left/adds')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/left/adds')
                ->with('error', 'No successfully.');
        }


    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=DB::table('homeslider')->where('homeslider_id',$id)->delete();
        if ($result) {
            return redirect('admin/sliders')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/sliders')
                ->with('error', 'No successfully.');
        }
    }

    public function add_destroy($id)
    {
        $result=DB::table('right_add')->where('right_add_id',$id)->delete();
        if ($result) {
            return redirect('admin/right/adds')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/right/adds')
                ->with('error', 'No successfully.');
        }
    }

    public function left_add_destroy($id)
    {
        $result=DB::table('left_add')->where('left_add_id',$id)->delete();
        if ($result) {
            return redirect('admin/left/adds')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/left/adds')
                ->with('error', 'No successfully.');
        }
    }

}

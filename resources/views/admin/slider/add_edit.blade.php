@extends('layouts.master')
@section('pageTitle')
    Update Slider
@endsection
@section('mainContent')
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">


        <div class="col-sm-offset-0 col-md-12">
            <form action="{{ url('admin/right/add/update') }}/{{ $add->right_add_id }}" class="form-horizontal" method="post"
                  enctype="multipart/form-data">
                @csrf


                <div class="box" style="border: 2px solid #ddd;">
                    <div class="box" style="border: 2px solid #ddd;">
                        <div class="box-header with-border" style="background-color: green;color:white;">
                            <h3 class="box-title">Right Add Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-7 col-sm-12" style="margin-left: 10px">
                                    <div class="form-group">
                                        <label for="category_title">Add Title<span class="required">*</span></label>
                                        <input required type="text" id="add_title" class="form-control the_title"
                                               name="add_title" value="{{$add->add_title}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="category_title">Add Title link<span class="required">*</span></label>
                                        <input required type="text" id="add_link" class="form-control the_title"
                                               name="add_link" value="{{$add->add_link}}">
                                    </div>

                                </div>
                                <div class="col-md-4 col-sm-12" style="margin-left: 10px">



                                    <div class="form-group featured-image">
                                        <img style="margin-left:20px" src="{{URL::to('/public')}}/uploads/sliders/{{$add->add_image}}" width="200" height="50"/>
                                        <input type="hidden" name="old_picture" value="{{$add->add_image}}">


                                        <label>Image</label>
                                        <input type="file" class="form-control" name="add_image">

                                    </div>
                                    <!-- /.form-group -->
                                </div>

                            </div>


                        </div>

                        <!-- /.box-body -->

                    </div>

                    <div class="box-footer">
                        <input type="submit" class="btn btn-success pull-right" value="Update">

                    </div>
                </div>




            </form>
        </div>
    </div>





@endsection



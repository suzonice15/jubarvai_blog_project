@extends('layouts.master')
@section('pageTitle')
    Add New Slider
@endsection
@section('mainContent')
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">


        <div class="col-sm-offset-0 col-md-12">

            <form action="{{ url('admin/right/add/store') }}" class="form-horizontal" method="post"
                  enctype="multipart/form-data">
                @csrf

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
                                           name="add_title" value="">
                                </div>
                                <div class="form-group">
                                    <label for="category_title">Add Title link<span class="required">*</span></label>
                                    <input required type="text" id="add_link" class="form-control the_title"
                                           name="add_link" value="">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-12" style="margin-left: 10px">



                                <div class="form-group featured-image">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="add_image">

                                </div>
                                <!-- /.form-group -->
                            </div>

                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-success pull-right" value="Save">

                        </div>

                    </div>

                    <!-- /.box-body -->

                </div>





            </form>

        </div>
    </div>

@endsection



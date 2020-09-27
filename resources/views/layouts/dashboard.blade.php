@extends('layouts.master')
@section('pageTitle')
  Dashboard View
@endsection
@section('mainContent')
<br>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua" style="background-color:green">
                <div class="inner">
                    <h3>{{$total_post}}</h3>

                    <p>Total Post</p>
                </div>

                <a href="{{url('/')}}/admin/posts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua" style="background-color:green">
                <div class="inner">
                    <h3>{{$total_page}}</h3>

                    <p>Total Page</p>
                </div>

                <a href="{{url('/')}}/admin/pages" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua" style="background-color:green">
                <div class="inner">
                    <h3>{{$total_category}}</h3>

                    <p>Total Category</p>
                </div>

                <a href="{{url('/')}}/admin/categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>


@endsection


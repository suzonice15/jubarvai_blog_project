@extends('website.master')
@section('mainContent')




    <section class="">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-lg-8 col-xs-12">

                    <?php
                    if($posts){

                    foreach ($posts as $sidebar) {
                    ?>

                    <div class="col-sm-6 col-md-4 col-xs-6" style="float:left">
                        <a href="{{url('/')}}/post/{{$sidebar->post_name}}"> <img   class="img-responsive" style="background-color: #ddd;
padding: 4px;width:116%" src="{{ url('/public/uploads') }}/{{ $sidebar->folder }}/thumb/{{ $sidebar->feasured_image }}" alt="">
                        </a>
                        <a  style="width: 241px;background-color: #ddd;padding: 9px;height: 50px;overflow: hidden;" href="{{url('/')}}/post/{{$sidebar->post_name}}">{{$sidebar->post_title}}</a>
                    </div>



                    <?php }

                    }

                    ?>
                    <br/>
                    <div class="col-sm-12 col-md-12" style="float:left">

                        {!! $posts->links() !!}
                    </div>

                </div><!-- col-sm-8 -->

                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-4">

                    @include('website.includes.sidebar')
                </div><!-- col-sm-4 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>



@endsection

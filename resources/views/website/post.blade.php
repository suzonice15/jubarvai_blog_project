@extends('website.master')
@section('mainContent')




    <section class="ptb-30">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8">



                    <div class="p-30 mb-30 card-view">
                        <img src="images/slider-8-1200x600.jpg" alt="">
                        <h3 class="mt-30 mb-5"><b>{{$post->post_title}}</b></h3>
                        <ul class="list-li-mr-10 color-lite-black">
                            <li><i class="mr-5 font-12 ion-clock"></i>{{ date("M d Y",strtotime($post->modified_time)) }}</li>
                            <li><i class="mr-5 font-12 ion-android-person"></i>{{$post->user}}</li>
                            {{--<li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>{{$sidebar->user}}</li>--}}
                            <li><i class="mr-5 font-12 ion-eye"></i>{{$post->visitor}}</li>
                        </ul>

                        <div class="col-md-12 col-md-12 col-xs-12">

                            <img  class="img-responsive" src="{{ url('/public/uploads') }}/{{ $post->folder }}/{{ $post->feasured_image }}">

                        </div>
                        <br>
                        <br>

                     <?php

                        echo $post->post_description;
                        ?>

                         <div class="sided-half">
                            <ul class="s-left ptb-5 list-btn-semiwhite sided-sm-center">

                                <?php
                                $str = $post->seo_keywords;
                                $keywors=explode(",",$str);
                                if($keywors){
                                    foreach ($keywors as $key) {
                                ?>
                                <li><a href="#">{{$key}}</a></li>
                                <?php }}?>

                            </ul>


                        </div><!-- sided-half -->


<h3>Related Post</h3>
                        <?php $count=0;

                        ?>
                        @if($related)
                            @foreach($related->unique('post_name')  as $rel)

                                <?php $count++ ;
                                if($count <=3 ) {

                                ?>
                                <div class="col-xs-12 col-md-4" style="float:left">
                                    <a href="{{url('/')}}/post/{{$rel->post_name}}">

                            <img src="{{ url('/public/uploads') }}/{{ $rel->folder }}/{{ $rel->feasured_image }}">
                                    </a>
                            <h4> <a href="{{url('/')}}/post/{{$rel->post_name}}"> {{$rel->post_title}}</a></h4>

                        </div>
                                <?php } ?>
                            @endforeach
                            @endif


                    </div><!-- card-view -->

                          </div><!-- col-sm-8 -->

                <div class="col-md-12 col-lg-4">
                    <!-- START OF SIDEBAR MOST READ -->


                     @include('website.includes.sidebar')


                </div><!-- col-sm-4 -->
            </div><!-- row -->
        </div><!-- container -->


    </section>
    <script type="text/javascript"
            src="https://www.sohojbuy.com/assets/font_end/dist/jquery.floating-social-share.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://www.sohojbuy.com/assets/font_end/dist/jquery.floating-social-share.min.css"/>

    <script>
        var url = window.location.href;

        $("body").floatingSocialShare({
            buttons: [
                "facebook", "linkedin", "pinterest",
                "twitter", "whatsapp"
            ],
            text: "share with:",
            url: document.URL,

        });

    </script>

@endsection

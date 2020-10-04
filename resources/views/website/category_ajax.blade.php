
<?php
                if(isset($posts)){
?>
<section class="">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8">

                <?php

                foreach ($posts as $sidebar) {
                ?>

                <div class="mb-30 sided-250x card-view">
                    <div class="s-left">
                        <img src="{{ url('/public/uploads') }}/{{ $sidebar->folder }}/thumb/{{ $sidebar->feasured_image }}" alt="">
                    </div><!-- left-area -->
                    <div class="s-right ptb-50 p-sm-20 pb-sm-5 plr-30 plr-xs-0">
                        <h4><a href="{{url('/')}}/{{$sidebar->post_name}}">{{$sidebar->post_title}}</a></h4>
                        <ul class="mtb-10 list-li-mr-20 color-lite-black">
                            <li><i class="mr-5 font-12 ion-clock"></i>{{ date("M d Y",strtotime($sidebar->modified_time)) }}</li>
                            <li><i class="mr-5 font-12 ion-android-person"></i>{{$sidebar->user}}</li>
                            {{--<li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>15</li>--}}
                            <li><i class="mr-5 font-12 ion-eye"></i>105</li>
                        </ul>
                    </div><!-- right-area -->
                </div><!-- sided-250x -->

                <?php }?>

            </div><!-- col-sm-8 -->

            <div class="col-md-12 col-lg-4">

                @include('website.includes.sidebar')





            </div><!-- col-sm-4 -->
        </div><!-- row -->
    </div><!-- container -->
</section>


<?php }?>


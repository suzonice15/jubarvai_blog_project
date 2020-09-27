@extends('website.master')
@section('mainContent')


    <!-- Left and right controls -->
    <br/>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container-fluid">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <?php

                if ($sliders) {
                    $html = '';
                    $indicators = '';
                    $i = 0;
                    foreach ($sliders as $slider) {
                        $homeslider_banner = url('public/uploads/sliders') . '/' . $slider->homeslider_picture;

                        $html .= '<div class="item ' . ($i == 0 ? 'active' : null) . '">
												<img src="' . $homeslider_banner . '" alt="Dhaka Image Slider">
											</div>';

                        $indicators .= '<li data-target="#carousel-example-generic" data-slide-to="' . $i . '" class="' . ($i == 0 ? 'active' : null) . '">&nbsp;</li>';

                        $i++;

                    }
                    $html .= '<ol class="carousel-indicators">' . $indicators . '</ol>';

                }
                echo $html;
                ?>


            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <!-- End Left and right controls -->


    <section class="">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-lg-8 col-sm-6 col-xs-12">
                    <center><h1 style="font-size:4vw;">TopBettingSite24.com</h1></center>
                    
                    <center><h1 style="font-size:3vw;">Alternative Links for Bookmakers</h1></center>


                    <center><a
                            href="http://wlskrill.adsrv.eacdn.com/C.ashx?btag=a_87022b_3877c_&affid=82487&siteid=87022&adid=3877&c="><img
                                src="https://www.topbettingsite24.com/public/uploads/ads/1xbet-790.png"
                                style="width: 100%;height: auto;"></a></center>

                    <div class="elementor-text-editor elementor-clearfix"><h3><span style="font-size: 12pt;">What is a topbettingsite24 Site?</span>
                        </h3>
                        <p class="color-1"><span
                                style="font-family: 'times new roman', times, serif; font-size: 12pt; color: #000000;">A top betting site 24 Site is simply a replica of the original site, which in our case is created by bookmakers to allow access to its customers in countries where the web address is obscured by local governments, because in most cases the bookmaker doesn’t possess a so-called national license to operate in that specific country. Some bookmakers create the topbettingsite24 sites to reduce web traffic and improve the availability of the original site, but in our case this is very rare situational. Of course, the topbettingsite24 site is an official site, the only difference that we notice is the web address is different from the original. Mirror sites are in degrees to provide the same safety standards as the original site, being a copy of it, so using them is not cause for concern.</span>
                        </p></div>
                    <br/>


                    <center><a
                            href="http://wlskrill.adsrv.eacdn.com/C.ashx?btag=a_87022b_3877c_&affid=82487&siteid=87022&adid=3877&c="><img
                                src="https://www.topbettingsite24.com/public/uploads/ads/skrill-account.gif"
                                style="width: 100%;height: auto;"></a></center>


                    <h1 class="elementor-heading-title elementor-size-medium">Comparison Table of Top Betting Sites</h1>

                    <!-- add  section -->

                    <style>


                        [data-tip] {

                            position: relative;

                        }

                        [data-tip]:before {

                            content: '';

                            /* hides the tooltip when not hovered */

                            display: none;

                            content: '';

                            border-left: 5px solid transparent;

                            border-right: 5px solid transparent;

                            border-bottom: 5px solid #1a1a1a;

                            position: absolute;

                            top: 30px;

                            left: 35px;

                            z-index: 8;

                            font-size: 0;

                            line-height: 0;

                            width: 0;

                            height: 0;
                        }

                        [data-tip]:after {

                            display: none;

                            content: attr(data-tip);

                            position: absolute;

                            top: 35px;

                            left: 0px;

                            padding: 5px 5px;

                            background: #1a1a1a;

                            color: #fff;

                            z-index: 9;

                            font-size: 0.75em;

                            height: 28px;

                            line-height: 18px;

                            -webkit-border-radius: 3px;

                            -moz-border-radius: 3px;

                            border-radius: 3px;

                            white-space: nowrap;

                            word-wrap: normal;
                        }

                        [data-tip]:hover:before,
                        [data-tip]:hover:after {

                            display: block;
                        }


                        .hover_button_clsss:hover {

                            background-color: red;

                            border: red;
                        }
                        .mobile_left_add{display: none}

                        @media screen and (max-width: 576px) {
                            .mobile_left_add{display: block}
                            .desktop_left_add{display: none}

                        }

                    </style>
                    <br>
                    <br>
                    <div class="row">

                        <div class="col-md-9 mobile_left_add">
                            @if($lefts)
                                @foreach($lefts as $left)
                            <div class="col-xs-12">
                                <img
                                    src="{{URL::to('/public')}}/uploads/sliders/{{$left->add_image}}"
                                    width="400"
                                    height="130">
                            </div>
                            <div class="col-xs-12">
                                <?php echo $left->add_title; ?>
                            </div>
                            <div class="col-xs-12" style="text-align: center;">

                                <div  data-tip="Copy to clipboard">
                                    <span style="color:black;text-align: center"><b>Promo Code</b></span>
                                    <input  style="margin-top: 15px;margin-bottom: 5px;" id="{{$left->left_add_id}}" onclick="copyToClipboard('{{$left->left_add_id}}')" type="text" value="{{$left->promo_link}}">
                                </div>
                                <p    style="display:none;color: green;text-align: center;font-weight: bold"
                                      id="success_{{$left->left_add_id}}">Copied the text</p>

                                <center>

                                    <a    href="{{$left->add_link}}"       target="_blank"

                                          class="btn btn-success hover_button_clsss">

                                        Join
                                        Now


                                    </a>
                                </center>
                                <br/>

                            </div>
                                @endforeach
                            @endif



                        </div>
                        

                        <div class="col-md-9 desktop_left_add">


                            <table class="table table-bordered table-striped table-responsive">

                                <tbody>
                                @if($lefts)
                                    @foreach($lefts as $left)
                                        <tr>
                                            <td>
                                                <img
                                                    src="{{URL::to('/public')}}/uploads/sliders/{{$left->add_image}}"
                                                    width="300"
                                                    height="100">
                                            </td>
                                            <td><?php echo $left->add_title; ?></td>
                                            <td style="text-align: center;">
                                                <span style="color:red;text-align: center">Promo Code</span>
                                                <div  data-tip="Copy to clipboard">
                                                    <input  style="margin-top: 15px;width: 100%;margin-bottom: 5px;" id="{{$left->left_add_id}}" onclick="copyToClipboard('{{$left->left_add_id}}')" type="text" value="{{$left->promo_link}}">
                                                </div>
                                                <p    style="display:none;color: green;text-align: center;font-weight: bold"
                                                    id="success_{{$left->left_add_id}}">Copied the text</p>

                                               <center>

                                                   <a    href="{{$left->add_link}}"       target="_blank"

                                                         class="btn btn-success hover_button_clsss">

                                                       Join
                                                       Now


                                                   </a>
                                               </center>



                                            </td>
                                        </tr>


                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-3">
                            <table>


                                <tbody>

                                @if($rights)
                                    @foreach($rights as $right)
                                        <tr>
                                            <td>
                                                <a href="{{$right->add_link}}">
                                                    <img
                                                        src="{{URL::to('/public')}}/uploads/sliders/{{$right->add_image}}"
                                                        alt="topbettingsite24">

                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif
                                </tbody>
                            </table>


                        </div>

                    </div>
                    
                    
<br/>

<center><a
                            href="http://wlskrill.adsrv.eacdn.com/C.ashx?btag=a_87022b_3877c_&affid=82487&siteid=87022&adid=3877&c="><img
                                src="https://www.topbettingsite24.com/public/uploads/ads/neteller-banner.png"
                                style="width: 100%;height: auto;"></a></center>

<br/>

                    <div class="col-sm-12 col-md-12 col-xs-12 " >
                    <?php
                    if($posts){

                    foreach ($posts as $sidebar) {
                    ?>

                    <div class="col-sm-6 col-xs-6 col-md-4" style="float:left">
                        <a href="{{url('/')}}/post/{{$sidebar->post_name}}">
                            <img class="img-responsive"
                                 style="background-color: #ddd;
padding: 4px;width:118%
" src="{{ url('/public/uploads') }}/{{ $sidebar->folder }}/thumb/{{ $sidebar->feasured_image }}" alt="">
                        </a>
                        <h4 style="background: #ddd;
padding: 7px;
height: 58px;
margin-bottom: 20px;
overflow: hidden;width: 102%;">
                            <a href="{{url('/')}}/post/{{$sidebar->post_name}}">{{$sidebar->post_title}}</a></h4>

                    </div>


                    <?php }

                    }

                    ?>
                    </div>
                    <br/>




                    <div class="col-sm-12 col-md-12" style="float:left">

                        {!! $posts->links() !!}
                    </div>




                </div>
                

                <!-- col-sm-8 -->

                <div class="col-md-12 col-lg-4">


                    @include('website.includes.sidebar')
                </div><!-- col-sm-4 -->


            </div><!-- row -->

        </div>

        <!-- fotter adds -->

        <center><a
                            href="http://wlskrill.adsrv.eacdn.com/C.ashx?btag=a_87022b_3877c_&affid=82487&siteid=87022&adid=3877&c="><img
                                src="https://www.topbettingsite24.com/public/uploads/ads/skrill-account.gif"
                                style="width: 100%;height: auto;"></a></center>
        <!-- fotter adds -->




        <!-- container -->
    </section>


    <script>

        function copyToClipboard(target) {

            var element = document.getElementById(target);
            var text = element.value;
            $('#success_' + target).show();

            CopyToClipboard(text);

        }

        function CopyToClipboard(text) {

            if (window.clipboardData && window.clipboardData.setData) {
                // IE specific code path to prevent textarea being shown while dialog is visible.
                return clipboardData.setData("Text", text);

            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
                document.body.appendChild(textarea);
                textarea.select();

                try {
                    return document.execCommand("copy");  // Security exception may be thrown by some browsers.
                } catch (ex) {
                    console.warn("Copy to clipboard failed.", ex);
                    return false;
                } finally {
                    document.body.removeChild(textarea);
                }
            }
        }

    </script>
@endsection

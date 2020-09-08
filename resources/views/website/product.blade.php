@extends('website.master')
@section('mainContent')

    <style>
        /*# review rating #*/
        form.reviewform .form-group {
            float: left;
            width: 100%;
        }

        form.reviewform .srating {
            border: none;
            float: left;
        }

        form.reviewform .srating.validation-error {
            border: 1px solid #eb2a2e;
        }

        form.reviewform .srating > input {
            display: none;
        }

        form.reviewform .srating > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        form.reviewform .srating > .half:before {
            content: "\f089";
            position: absolute;
        }

        form.reviewform .srating > label {
            color: #ddd;
            float: right;
        }

        form.reviewform .srating > input:checked ~ label,
        form.reviewform .srating:not(:checked) > label:hover,
        form.reviewform .srating:not(:checked) > label:hover ~ label {
            color: #FFD700;
        }

        form.reviewform .srating > input:checked + label:hover,
        form.reviewform .srating > input:checked ~ label:hover,
        form.reviewform .srating > label:hover ~ input:checked ~ label,
        form.reviewform .srating > input:checked ~ label:hover ~ label {
            color: #FFED85;
        }


        .rating span {
            position: absolute;
            left: 0;
            top: 0;
            height: 18px;
            background: url(http://www.kalerhaat.com/images/stars.png) 0 -18px repeat-x;
        }

        .rating-overall > div {
            margin: 4px 0 5px;
            color: #444;
            font-size: 13px;
            font-weight: 600px;
        }

        .rating-overall .track {
            position: relative;
            display: inline-block;
            margin: 0 8px;
            width: 120px;
            height: 13px;
            background: #ddd;
            vertical-align: middle;
        }

        .rating-overall .track.one-star {
            margin-left: 15px;
        }

        .rating-overall .track span {
            position: absolute;
            left: 0;
            top: 0;
            height: 13px;
            background: #999;
        }

        .rating-overall .track .bar20 {
            width: 48px;
        }

        .reviews .review-right .rating-overall-desc {
            display: block;
            padding: 0px 0px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            overflow: hidden;
        }

        .reviews .review-right .rating-overall-desc p {
            margin: 0px;
            line-height: normal;
        }

        .reviews .review-left .heading3 {
            margin: 0 0 15px;
            font-weight: 600;
            font-size: 16px;
        }

        .reviews .review-right .rating-overall-desc .rating, .reviews .review-right .rating-overall-desc p {
            display: inline-block;
            margin-right: 5px;
            font-weight: 600;
            vertical-align: middle;
            float: left;
        }

        .reviews .review-right ul.commentlist {
            margin: 20px 0 !important;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .reviews .review-right ul.commentlist li {
            left: 0 !important;
        }

        .reviews .review-right ul li {
            padding: 0 0 20px;
        }

        .reviews2 .review-right ul li {
            margin-left: 30px !important;
        }

        .reviews li {
            float: left;
            padding: 10px 0 6px;
            width: 100%;
            border-bottom: 1px solid #ddd;
        }

        .reviews .review-right ul.commentlist li .review-user.review-header {
            text-align: left !important;
            width: 100% !important;
            padding-top: 8px;
        }

        .reviews li .review-user {
            float: left;
            width: 18%;
            text-align: right;
        }

        .reviews .review-header .rating {
            display: inline-block;
            margin-right: 10px;
            vertical-align: middle;
        }

        .reviews .review-header h5 {
            display: inline-block;
            font-weight: 600;
            margin: 0;
        }

        .reviews #comments em.verified {
            background-color: #C95891;
            display: inline-block;
            padding: 2px 5px;
            color: #fff;
            font-size: 10px;
            text-transform: uppercase;
            font-style: normal;
            margin-right: 10px;
        }

        .reviews li .review-user small {
            display: inline-block;
            color: #555;
        }

        .reviews .review-right ul.commentlist li .review-body {
            clear: both;
        }

        .review-header h5 {
            display: inline-block;
            font-weight: 600;
            margin: 0;
        }

        .rating {
            position: relative;
            display: inline-block;
            width: 90px;
            height: 17px;
            background: url(http://www.kalerhaat.com/images/stars.png) 0 0 repeat-x;
            float: left;
        }

        .review-right .rating-overall-desc {
            display: block;
            padding: 0px 0px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            overflow: hidden;
        }

        .review-right .rating-overall-desc .rating, .reviews .review-right .rating-overall-desc p {
            display: inline-block;
            margin-right: 5px;
            font-weight: 600;
            vertical-align: middle;
            float: left;
        }

        .review-right .rating-overall-desc p {
            margin: 0px;
            line-height: normal;
        }

        .review-right ul.commentlist {
            margin: 20px 0 !important;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .review-right ul.commentlist li {
            left: 0 !important;
        }

        .reviews .review-right ul li {
            padding: 0 0 20px;
        }

        .reviews li {
            float: left;
            padding: 10px 0 6px;
            width: 100%;
            border-bottom: 1px solid #ddd;
        }

        .review-right ul.commentlist li .review-user.review-header {
            text-align: left !important;
            width: 100% !important;
            padding-top: 8px;
        }
    </style>

    <div class="container" style="padding-top: 10px;">
        <div class="row">
            <span class="live_product"></span>

        </div>
    </div>
    <?php
    //
    //
    ////$vendor_id=$product->vendor_id;
    //    $review_count=  DB::table('review')->where('product_id',$product->product_id)->count();
    //    $reviews=  DB::table('review')->where('product_id',$product->product_id)->get();
    //
    //if($vendor_id > 0){
    //  $vendor=  DB::table('vendor')->select('vendor_link','vendor_shop')->where('vendor_id',$vendor_id)->first();
    //    $shop_link=$vendor->vendor_link;
    //    $shop_name=$vendor->vendor_shop;
    //}


    $product_id_related = $product->product_id;
    ?>

    <div class="breadcrumb remove_class">
        <div class="container-fluid">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/category/')}}/{{$category_name}}">{{$category_title}}</a></li>
                    <li class='active'>{{$product->product_title}}</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <div class="container" style="padding-right:0px">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile-padding-left-15px">
                <div class="panel panel-info " style="border:0;box-shadow:none">

                    <div class="panel-body mobile-padding-zero" style="padding:15px 0 ">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xs-12  ">
                                <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 details_whole"
                                     style="padding-left: 0px">

                                    <div
                                        class="tab-design-product mobile-padding-zero mobile-padding-10px col-lg-6 col-md-6 col-sm-6 col-xs-12"
                                        style="padding-left: 0;">


                                        <div class="slider">
                                            <img class="img-responsive xzoom" alt=""
                                                 src="{{ url('/public/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}"
                                                 xoriginal="{{ url('/public/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}"/>

                                        </div>

                                        <br>
                                        <br>
                                        <ul>
                                            <li style="display: -webkit-box;float: left;">


                                                <a>
                                                    <img width="50" class="img-responsive xzoom" alt=""
                                                         src="{{ url('/public/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}"
                                                         xoriginal="{{ url('/public/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}"/>


                                                </a>
                                            </li>

                                        </ul>


                                    </div>

                                    <div
                                        class="mobile-margin-left-zero mobile-margin-bottom-45 col-lg-6 col-md-6 col-sm-6 col-xs-12  right"
                                        style="padding:0;min-height: 300px">
                                        <div class="col-sm-12" id="P_UserOrderForm1267" style="padding:0">


                                            <h4 class="modal-title" id="gridSystemModalLabel"
                                                style="font-size: 22px;font-weight: bold;color: #525252">{{$product->product_title}}</h4>

                                            <p style="margin: 10px 0 0 0;color: #000;font-size: 16px;font-weight:bold">
                                                স্টক :

                                                <?php

                                                if ($product->product_stock <= 0){
                                                ?>
                                                <strong style="color:red;font-size: 16px;">Out Of Stock </strong>

                                                <?php } else { ?>

                                                <strong style="color:green;font-size: 16px;"> In Stock </strong>


                                                <?php }?>                                            </p>


                                            <div class="col-xs-12 col-sm-6 col-md-6 " style="padding: 0px;">

                                                <?php
                                                if ($product->discount_price) {
                                                    $sell_price = $product->discount_price;
                                                } else {
                                                    $sell_price = $product->product_price;
                                                }
                                                ?>

                                                <p style="margin: 10px 0;color:#00255f;font-size: 20px">মূল্য

                                                    <?php
                                                    if($product->discount_price){


                                                    ?>
                                                    <del>@money($product->product_price)</del>

                                                    <?php } ?>
                                                    <strong style="color:#0078B8"> @money($sell_price) </strong></p>


                                                <p style="font-size: 16px;background: #64C284;color: #fff; display: inline-block;padding: 1px 8px;border-radius: 20px;">
                                                    প্রোডাক্ট কোড: {{$product->sku}}</p>

                                                <input type="hidden" name="QtnLimitPerUserHiddenField"
                                                       id="QtnLimitPerUserHiddenField"
                                                       value="{{$product->product_stock}}">

                                                <div class="col-xs-12 col-sm-12 col-md-12 deal-quantity"
                                                     style="padding-left: 0px;margin-top: 10px">
                                                    <div id="Quantity">
                                                        <span style="float: left;margin-top: 5px">পরিমান : </span>

                                                        <div
                                                            style="float: left; border: solid 1px #24b193; width: 150px; height: 36px;margin-left:5px">
                                                            <div
                                                                style="color:orangered;font-size: 25px;text-align: center; width: 50px; float: left; cursor: pointer;font-weight: bold;"
                                                                onclick="DecrementFunction();">
                                                                -
                                                            </div>

                                                            <span
                                                                style="font-size: 25px;text-align: center;color: gray; width: 50px; float: left; cursor: pointer;border-right: 1px solid #24b193;border-left: 1px solid #24b193;font-weight: bold;"
                                                                id="quantity">1</span>

                                                            <div onclick="IncrementFunction()"
                                                                 style="font-weight: bold;color:orangered;font-size: 25px;text-align: center; width: 40px; float: left;
                                                             cursor: pointer;">
                                                                +
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 "
                                                 style="padding: 0px;margin-top: 30px;    margin-bottom: 30px;">

                                                <div class="btn col-xs-12 col-sm-12 col-md-12"
                                                     style="font-size: 21px;margin-bottom: 20px;background:#f16e52 ;color:#fff;border-radius: 7px;">


                                                        <a href="javascript:void(0)"
                                                           data-product_id="{{ $product->product_id}}"
                                                           data-picture="{{ url('/public/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}"
                                                           class="buy-now-cart high_spreed_buy"

                                                           style="color:white;background: transparent;border: none;margin: 0;padding: 0">
                                                            অর্ডার করুন
                                                        </a>
                                                </div>

                                                <div class=" btn col-xs-12 col-sm-12 col-md-12 add_to_cart  "
                                                     data-product_id="{{ $product->product_id}}" data-picture="{{ url('/public/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}"

                                                     style="background:#37A1D1;color:#fff;font-size: 21px;border-radius: 7px;">
                                                    কার্ট-এ যোগ করুন
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12" style="padding:0">
                                                <h4 style="font-weight:bold;color:#000"> ফোনে অর্ডারের জন্য ডায়াল করুন
                                                </h4>
                                                <div class="col-sm-6 col-xs-12" style="padding:0">
                                                    <h4 style="font-size:25px;margin: 15px 0 15px -18px;text-align:center;color:#0078B8;font-weight:900;text-align: left">


                                                        <i class="fa fa-phone-square"
                                                           style="padding-left:20px;color:  #0078B8;"> </i> 01571-133188
                                                        <br>
                                                        <i class="fa fa-phone-square"
                                                           style="padding-left:20px;color: #0078B8;"> </i> 01758-902942
                                                        <br>


                                                    </h4>
                                                </div>


                                                <div class="col-sm-12 col-md-12  col-xs-12" style="padding: 0">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                ঢাকায় ডেলিভারি খরচ
                                                            </td>
                                                            <td>
                                                                <b>৳ {{$product->delivery_in_dhaka}} .00</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                ঢাকার বাইরের ডেলিভারি খরচ
                                                            </td>
                                                            <td>
                                                                <b>৳ {{$product->delivery_out_dhaka}} 00</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom: 1px solid #ddd;">
                                                                বিকাশ মার্চেন্ট নাম্বার
                                                            </td>
                                                            <td style="border-bottom: 1px solid #ddd;">
                                                                <strong>01815-330597</strong>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>


                                                </div>


                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 "><br></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading"><strong style="font-size: 22px;font-weight: bold;color: #525252">পন্যের
                            বিবরণ </strong></div>
                    <div class="panel-body" style="padding-left: 0;padding-right: 30px">
                        <div class="row">
                            <div class=" col-lg-12 col-sm-12 brand text-center"
                                 style="background-color: #fff;padding: 0">

                                <div id="my-tab-content" class="tab-content"
                                     style="padding-left: 0px;padding-right: 0px;">
                                    <!-- top category tab -->
                                    <div class="tab-pane active" id="course-detail1267">

                                        <div class="tab-content panel-body" style="padding: 0">


                                            <div class="tab-content panel-body" style="padding: 0">

                                                <div id="ListStyle2" class="col-sm-12 text-left product-dynamic-details"
                                                     style="padding: 0px;padding-left:25px">
                                                    {{$product->product_description}}


                                                </div>


                                            </div>


                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!--Similar Product-->
                <div class="panel panel-info " style="background:#fff; ">
                    <div class="panel-heading">

                        <h4 class="modal-title" id="gridSystemModalLabel"
                            style="font-size: 22px;font-weight: bold;color: #525252">

                            রিলেটেড প্রোডাক্ট
                        </h4>

                    </div>
                    <div class="panel-body mobile-padding-zero">
                        <div class="col-lg-12 col-md-12 col-sm-12 "
                             style="background:#fff;padding: 5px; padding: 0px;margin-bottom: 20px;  border-right:0;border-bottom:0"
                             >


                            <span id="related_product"></span>

                        </div>


                    </div>
                </div>
                <!--Similar Product End-->


            </div>
        </div>
    </div>
    <input type="hidden" id="related_product_id" name="product_id" value="<?php echo $product->product_id; ?>">


    <script>
        function IncrementFunction() {

            var x = document.getElementById("quantity").innerHTML;

            var quantity;
            var limit = document.getElementById("QtnLimitPerUserHiddenField").value;


            if (x > 0 && x < 100) {

                quantity = Number(x) + 1;
                if (quantity > limit) {
                    alert("Sorry We Have Only " + limit + " Pic Products");
                } else {
                    document.getElementById("quantity").innerHTML = quantity;
                }
            }
//        return false;
        }

        function DecrementFunction() {
//          alert(Obj);
            var x = document.getElementById("quantity").innerHTML;
            var limit = document.getElementById("QtnLimitPerUserHiddenField").value;

            var quantity;
//        alert(quantity);
            if (x > 1) {
                quantity = Number(x) - 1;
                document.getElementById("quantity").innerHTML = quantity;

            } else {

                alert("You Order at least 1 item we have " + limit + " Pic Products");


            }

        }

    </script>
    <script>
        jQuery(document).ready(function () {


            var product_id = jQuery('#related_product_id').val();


            $.ajax({

                url: "{{url('related/product')}}?product_id=" + product_id,
                method: "get",
                success: function (data) {

                    jQuery("#related_product").html(data.html);


                }
            });
        });

    </script>



@endsection


<?php

$page=DB::table('page')

    ->get();

$get_single_option = get_single_option();

?>
<?php
if (isset($page_title)) {
    $title = $page_title . '-' . get_option('site_title');
} else {
    $title = get_option('site_title');
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title><?php if (isset($title)) {
            echo $title;
        }?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta property="og:image" content="https://sportal.betxchange.com/wp-content/uploads/2017/01/sports-betting1.jpg" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">

    <!-- Stylesheets -->


    <meta name="title" content="<?php if (isset($seo_title)) {
        echo $seo_title;
    }?>"/>
    <meta name="keywords" content="<?php if (isset($seo_keywords)) {
        echo $seo_keywords;
    }?>"/>
    <meta name="description" content="<?php if (isset($seo_description)) {
        echo $seo_description;
    }?>"/>

    <meta name="robots" content="index,follow"/>


    <link rel="canonical" href="{{url()->current()}}"/>
    <meta property="og:locale" content="EN"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="<?php if (isset($seo_description)) {
        echo $seo_description;
    }?>"/>
    <meta property="og:title" content="<?php if (isset($seo_title)) {
        echo $seo_title;
    }?>"/>
    <meta property="og:description" name="description" content="<?php if (isset($seo_description)) {
        echo $seo_description;
    }?>"/>
    <meta property="og:image" content="<?php if (isset($share_picture)) {
        echo $share_picture;
    } ?>"/>
    <meta property="og:site_name" content="<?php if (isset($seo_keywords)) {
        echo $seo_keywords;
    }?>"/>


    <link href="{{ asset('assets/font_end')}}/plugin-frameworks/bootstrap.css" rel="stylesheet">

    <link href="{{ asset('assets/font_end')}}/fonts/ionicons.css" rel="stylesheet">


    <link href="{{ asset('assets/font_end')}}/common/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/font_end')}}/sharetastic.css"/>
    <link href="https://www.topbettingsite24.com/wp-content/plugins/elementor/assets/css/frontend.min.css" rel="stylesheet">
    <script src="{{ asset('assets/font_end')}}/plugin-frameworks/jquery-3.2.1.min.js"></script>


</head>
<body>

<header>
    <div class="top-header">
        <div class="container-fluid">
            <div class="oflow-hidden font-9 text-sm-center ptb-sm-5">

                <ul class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10 list-a-ptb-xs-5">
                    <li><a class="pl-0 pl-sm-10" href="#">Welcome to TopBettingSite24.com
                        </a></li>

                </ul>
                <ul class="float-right float-sm-none font-13 list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5 color-ash">
                    <li><a class="pl-0 pl-sm-10" href="https://www.facebook.com/topbettingsite/"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="https://twitter.com/topbetting_site"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                    <li><a href="#"><i class="ion-social-google"></i></a></li>
                    <li><a href="#"><i class="ion-social-rss"></i></a></li>
                </ul>

            </div><!-- top-menu -->
        </div><!-- container -->
    </div><!-- top-header -->

    <div class="middle-header mtb-20 mt-xs-0">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-4">
                    <a  class='logo' href="{{url('/')}}">
                        <img src="{{url('/')}}/public/uploads/{{$get_single_option->logo}}" alt="Logo">
                    </a>
                </div><!-- col-sm-4 -->

                <div class="col-sm-8">
                    <!-- Bannner bg -->
                    <div class="banner-area dplay-tbl plr-30 plr-md-10 color-white">
                        <div class="ptb-sm-15 dplay-tbl-cell">
                            <h5>Give your add</h5>
                            <h6>Contact with 0170000 000</h6>
                        </div><!-- left-area -->

                        <div class="dplay-tbl-cell text-right min-w-100x">
                            <!--<a class="btn-fill-white btn-b-sm plr-10" href="#">READ MORE</a>-->
                        </div><!-- right-area -->
                    </div><!-- banner-area -->
                </div><!-- col-sm-4 -->

            </div><!-- row -->
        </div><!-- container -->
    </div><!-- top-header -->

    <div class="bottom-menu">
        <div class="container-fluid">

            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

            <ul class="main-menu" id="main-menu">

                <?php

                if($page){ foreach ($page as $row){
                ?>

                

                    <?php }}?>
                    
                    
                    
                    <li class="click_single_menu"><a href="{{url('/')}}/blog">Home</a> </li>
                    <li class=" click_single_menu"><a href="{{url('/')}}/blog">Blog</a> </li>





                    <li class="drop-down"><a href="#!">Top Betting Sites<i class="ion-chevron-down"></i></a>
                <ul class="drop-down-menu drop-down-inner">
                <li><a href="#">1xbet</a></li>
                <li><a href="#">Bet365 </a></li>
                </ul>
                </li>
        
        
        
        
                <li class="drop-down"><a href="#!">Country<i class="ion-chevron-down"></i></a>
                <ul class="drop-down-menu drop-down-inner">
                <li><a href="#">Bangladesh</a></li>
                <li><a href="#">India </a></li>
                <li><a href="#">Pakistan </a></li>
                </ul>
                </li>
        
        
        
        
                <li class="drop-down"><a href="#!">Review<i class="ion-chevron-down"></i></a>
                <ul class="drop-down-menu drop-down-inner">
                <li><a href="#">Bet365 Review</a></li>
                <li><a href="#">1xbet Review </a></li>
                <li><a href="#">22Bet Review </a></li>
                </ul>
                </li>
                
                
                
                
                 <li class="drop-down"><a href="#!">Payment Method<i class="ion-chevron-down"></i></a>
                <ul class="drop-down-menu drop-down-inner">
                <li><a href="#">Neteller</a></li>
                <li><a href="#">PayPal </a></li>
                <li><a href="#">Bitcoin </a></li>
                </ul>
                </li>
        
        
        

            </ul>
            <div class="clearfix"></div>
        </div><!-- container -->
    </div><!-- bottom-menu -->
    

</header>


<?php
$sidebars=DB::table('post')
    ->select('post_title','post_name','modified_time','folder','visitor','feasured_image')
    ->where('status',1)->orderBy('post_id','desc')->paginate(10);
?>

<div class="mb-30 p-30 card-view">
    <h4 class="p-title"><b>Recent Posts</b></h4>

    <?php
    if($sidebars){

    foreach ($sidebars as $sidebar) {
    ?>
    <div class="sided-80x mb-20">

        <div class="s-left">
            <img src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($sidebar->folder); ?>/thumb/<?php echo e($sidebar->feasured_image); ?>" alt="">
        </div><!-- s-left -->

        <div class="s-right">
            <h5><a href="<?php echo e(url('/')); ?>/<?php echo e($sidebar->post_name); ?>">
                    <b><?php echo e($sidebar->post_title); ?></b></a></h5>
            <ul class="mtb-5 list-li-mr-20 color-lite-black">
                <li><i class="mr-5 font-12 ion-clock"></i><?php echo e(date("M d Y",strtotime($sidebar->modified_time))); ?></li>
                <li><i class="mr-5 font-12 ion-eye"></i><?php echo e($sidebar->visitor); ?></li>
            </ul>
        </div><!-- s-left -->


    </div><!-- sided-80x -->
    <?php }
    }?>

</div>

<!-- card-view -->


<div class="mb-30 p-30 card-view">
    <h4 class="p-title"><b>Post BY Category</b></h4>

    <?php
    $categories=DB::table('category')
        ->select('category_title','category_name')
        ->where('status',1)->orderBy('rank_order','asc')->paginate(10);

    if($categories){

        foreach ($categories as $category) {
            ?>
    <div class="sided-90x mb-20">



          <a href="<?php echo e(url('/')); ?>/category/<?php echo e($category->category_name); ?>"><h4><b><?php echo e($category->category_title); ?></b></h4></a>


    </div><!-- sided-90x -->

    <?php }
    }?>

</div>

<center><h1 style="font-size:3vw;">Ads</h1></center>

<hr/>
<center><a
                            href="http://wlskrill.adsrv.eacdn.com/C.ashx?btag=a_87022b_3877c_&affid=82487&siteid=87022&adid=3877&c="><img
                                src="https://www.topbettingsite24.com/public/uploads/ads/bestchange-250x250-1.gif"
                                style="width: 100%;height: auto;"></a></center>

<br/>


<!-- Start Recent Post-2 -->



<!-- End Recent Post-2 -->


<!-- Start Recent Post-2 -->





<!-- End Recent Post-2 -->

<!-- Facebook Page -->
<hr/>
<center><h1 style="font-size:3vw;">Our Facebook Page</h1></center>
<hr/>

<center><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftopbettingsite&tabs&width=300&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=186918729268188" width="300" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</center>

<!-- Facebook Page -->


<!-- Live Score -->

<center><a
                            href="http://refpasjque.top/L?tag=d_368809m_2897c_&site=368809&ad=2897"><img
                                src="https://www.topbettingsite24.com/public/ads/banner_300x600.gif"
                                style="width: 100%;height: auto;"></a></center>

<br/>



<!-- Live Score -->
<?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/website/includes/sidebar.blade.php ENDPATH**/ ?>
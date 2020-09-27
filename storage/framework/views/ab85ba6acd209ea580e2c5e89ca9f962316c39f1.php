<?php $__env->startSection('mainContent'); ?>




    <section class="ptb-30">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8">



                    <div class="p-30 mb-30 card-view">
                        <img src="images/slider-8-1200x600.jpg" alt="">
                        <h3 class="mt-30 mb-5"><b><?php echo e($post->post_title); ?></b></h3>
                        <ul class="list-li-mr-10 color-lite-black">
                            <li><i class="mr-5 font-12 ion-clock"></i><?php echo e(date("M d Y",strtotime($post->modified_time))); ?></li>
                            <li><i class="mr-5 font-12 ion-android-person"></i><?php echo e($post->user); ?></li>
                            
                            <li><i class="mr-5 font-12 ion-eye"></i><?php echo e($post->visitor); ?></li>
                        </ul>

                        <div class="col-md-12 col-md-12 col-xs-12">

                            <img  class="img-responsive" src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($post->folder); ?>/<?php echo e($post->feasured_image); ?>">

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
                                <li><a href="#"><?php echo e($key); ?></a></li>
                                <?php }}?>

                            </ul>


                        </div><!-- sided-half -->


<h3>Related Post</h3>
                        <?php $count=0;

                        ?>
                        <?php if($related): ?>
                            <?php $__currentLoopData = $related->unique('post_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php $count++ ;
                                if($count <=3 ) {

                                ?>
                                <div class="col-xs-12 col-md-4" style="float:left">
                                    <a href="<?php echo e(url('/')); ?>/post/<?php echo e($rel->post_name); ?>">

                            <img src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($rel->folder); ?>/<?php echo e($rel->feasured_image); ?>">
                                    </a>
                            <h4> <a href="<?php echo e(url('/')); ?>/post/<?php echo e($rel->post_name); ?>"> <?php echo e($rel->post_title); ?></a></h4>

                        </div>
                                <?php } ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>


                    </div><!-- card-view -->

                          </div><!-- col-sm-8 -->

                <div class="col-md-12 col-lg-4">
                    <!-- START OF SIDEBAR MOST READ -->


                     <?php echo $__env->make('website.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/website/post.blade.php ENDPATH**/ ?>
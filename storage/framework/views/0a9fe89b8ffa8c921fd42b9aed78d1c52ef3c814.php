<?php $__env->startSection('mainContent'); ?>


    <style>

        .home_page_title{

            width:193px;
            background-color: #ddd;
            padding: 9px;
            height: 50px;
            overflow: hidden;
            display: block;
            margin-top: -6px;
            margin-bottom: 5px;
        }
        .home_page_post{
            float:left;padding: 5px;
            width: 25%;
        }
        @media (max-width:600px) {
            .home_page_title{

                width: 141px;
                background-color: #ddd;
                padding: 9px;
                height: 50px;
                overflow: hidden;
                display: block;
                margin-top: -6px;
                margin-bottom: 5px;
            }
            .home_page_post{
                float:left;padding: 5px;
                width: 50%;
            }
        }


    </style>


    <section class="">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12">

                    <?php
                    if($posts){

                    foreach ($posts as $sidebar) {
                    ?>

                    <div class="home_page_post" style="float:left">
                        <a href="<?php echo e(url('/')); ?>/<?php echo e($sidebar->post_name); ?>"> <img   class="img-responsive" style="background-color: #ddd;
padding: 4px;" src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($sidebar->folder); ?>/thumb/<?php echo e($sidebar->feasured_image); ?>" alt="">
                        </a>
                        <a  class="home_page_title" href="<?php echo e(url('/')); ?>/<?php echo e($sidebar->post_name); ?>"><?php echo e($sidebar->post_title); ?></a>
                    </div>



                    <?php }

                    }

                    ?>
                    <br/>
                    <div class="col-sm-12 col-md-12" style="float:left">

                        <?php echo $posts->links(); ?>

                    </div>

                </div><!-- col-sm-8 -->

                <div class="col-md-4 col-sm-6 col-xs-6 col-lg-4">

                    <?php echo $__env->make('website.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div><!-- col-sm-4 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/website/blog.blade.php ENDPATH**/ ?>
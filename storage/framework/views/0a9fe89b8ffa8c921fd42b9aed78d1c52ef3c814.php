<?php $__env->startSection('mainContent'); ?>




    <section class="">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-lg-8 col-xs-12">

                    <?php
                    if($posts){

                    foreach ($posts as $sidebar) {
                    ?>

                    <div class="col-sm-6 col-md-4 col-xs-6" style="float:left">
                        <a href="<?php echo e(url('/')); ?>/post/<?php echo e($sidebar->post_name); ?>"> <img   class="img-responsive" style="background-color: #ddd;
padding: 4px;width:118%" src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($sidebar->folder); ?>/thumb/<?php echo e($sidebar->feasured_image); ?>" alt="">
                        </a>
                        <h4 style="background: #ddd;
padding: 7px;
height: 58px;
margin-bottom: 20px;
overflow: hidden;width:102%;" ><a href="<?php echo e(url('/')); ?>/post/<?php echo e($sidebar->post_name); ?>"><?php echo e($sidebar->post_title); ?></a></h4>

                    </div>



                    <?php }

                    }

                    ?>
                    <br/>
                    <div class="col-sm-12 col-md-12" style="float:left">

                        <?php echo $posts->links(); ?>

                    </div>

                </div><!-- col-sm-8 -->

                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-4">

                    <?php echo $__env->make('website.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div><!-- col-sm-4 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/website/blog.blade.php ENDPATH**/ ?>
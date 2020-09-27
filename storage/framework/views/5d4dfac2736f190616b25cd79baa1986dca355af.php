<?php $__env->startSection('pageTitle'); ?>
  Dashboard View
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<br>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua" style="background-color:green">
                <div class="inner">
                    <h3><?php echo e($total_post); ?></h3>

                    <p>Total Post</p>
                </div>

                <a href="<?php echo e(url('/')); ?>/admin/posts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua" style="background-color:green">
                <div class="inner">
                    <h3><?php echo e($total_page); ?></h3>

                    <p>Total Page</p>
                </div>

                <a href="<?php echo e(url('/')); ?>/admin/pages" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua" style="background-color:green">
                <div class="inner">
                    <h3><?php echo e($total_category); ?></h3>

                    <p>Total Category</p>
                </div>

                <a href="<?php echo e(url('/')); ?>/admin/categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>
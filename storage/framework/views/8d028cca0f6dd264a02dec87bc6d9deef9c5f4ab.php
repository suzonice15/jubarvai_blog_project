<?php $__env->startSection('pageTitle'); ?>
    All adds List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <div class="box-body">
        <div class="table-responsive" >
            <table id="example1" class="table table-bordered table-striped table-responsive ">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Title </th>
                    <th>Slug </th>
                    <th>link </th>
                    <th>Promolink </th>
                    <th>Picture</th>

                    <th >Action </th>
                </tr>
                </thead>
                <tbody>

                <?php if(isset($adds)): ?>
                    <?php $i=0;?>
                    <?php $__currentLoopData = $adds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$i); ?></td>
                            <td><?php echo $slider->add_title ?> </td>
                            <td><?php echo e($slider->add_slug); ?> </td>

                            <td><?php echo e($slider->add_link); ?> </td>
                            <td><?php echo e($slider->promo_link); ?> </td>
                            <td>
                                <?php if(isset($slider->add_image)): ?>
                                    <img src="<?php echo e(URL::to('/public')); ?>/uploads/sliders/<?php echo e($slider->add_image); ?>" width="50" height="50"/>

                                <?php else: ?>
                                    <img src="<?php echo e(URL::to('/public')); ?>/uploads/user/user.png" width="50" height="50"/>
                                <?php endif; ?>
                            </td>


                            <td>
                                <a title="edit" href="<?php echo e(url('admin/left/add/')); ?>/<?php echo e($slider->left_add_id); ?>">
                                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                                </a>


                                <a title="delete" href="<?php echo e(url('/admin/left/add/delete')); ?>/<?php echo e($slider->left_add_id); ?>" onclick="return confirm('Are you want to delete this information :press Ok for delete otherwise Cancel')">
                                    <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                                </a></td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>

            </table>

        </div>



    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/admin/slider/left_add_index.blade.php ENDPATH**/ ?>
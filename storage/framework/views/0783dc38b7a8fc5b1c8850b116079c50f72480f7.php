
    <?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->

    <?php echo $__env->make('layouts.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <?php if(isset($main) ) {  echo $main ; }    ?>

          </h1>

      </section>

    <!-- Main content -->
    <section class="content">
        <?php if(Session::has('success')): ?>
            <div class="callout callout-success">


                <h4>
                    <?php echo e(Session::get('success')); ?>


                </h4>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="callout callout-danger">

                <h4>
                    <?php echo e(Session::get('error')); ?>


                </h4>
            </div>
        <?php else: ?>


        <?php endif; ?>



      <!-- Default box -->
      <div class="box box-success">
          <?php echo $__env->yieldContent('mainContent'); ?>

      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2020 <a href="https://adminlte.io">jabaer ahmed</a> </strong> All rights
        reserved.
    </footer>


</div>

<?php echo $__env->make('layouts.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/layouts/master.blade.php ENDPATH**/ ?>
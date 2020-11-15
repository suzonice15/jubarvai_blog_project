
<?php
if($posts){

foreach ($posts as $sidebar) {
?>

<div class="home_page_post" >
    <a href="<?php echo e(url('/')); ?>/<?php echo e($sidebar->post_name); ?>">
        <img class="img-responsive"
             style="background-color: #ddd;
padding: 4px;width:118%
" src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($sidebar->folder); ?>/thumb/<?php echo e($sidebar->feasured_image); ?>" alt="">
    </a>

    <a class="home_page_title"  href="<?php echo e(url('/')); ?>/<?php echo e($sidebar->post_name); ?>"><?php echo e($sidebar->post_title); ?></a>

</div>


<?php }

}

?>



<br/>




<div class="col-sm-12 col-md-12" style="float:left">

    <?php echo $posts->links(); ?>

</div>
<?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/website/home_page_pagination.blade.php ENDPATH**/ ?>
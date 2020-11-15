

<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/')); ?>/<?php echo e($post->post_name); ?></loc>
            <lastmod><?php echo e($post->created_time); ?></lastmod>

            <priority>0.6</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>
<?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/website/sitemap.blade.php ENDPATH**/ ?>
<?php $__env->startSection('mainContent'); ?>




    <section class="">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8">
                        <span id="post-data">

                               <?php echo $__env->make('website.category_ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </span>


                    </div>

                </div>

            </div>


        </div>
    </section>



    <input type="hidden"  id="category_name" name="category_name" value="<?php echo e($category_name); ?>">


    <script type="text/javascript">

        var page = 1;
        //jQuery('.ajax-load').show();
        jQuery(window).scroll(function() {
            page++;
            loadMoreData(page);
        });


        function loadMoreData(page){
            var category_name=$('#category_name').val();
            jQuery.ajax(

                {
                    url:"<?php echo e(url('/ajax_category')); ?>?page="+page+"&category_name="+category_name,
                    type: "get",

                    beforeSend: function()

                    {

                        //jQuery('.ajax-load').show();

                    }

                })

                .done(function(data)

                {
                     console.log(data.html)
                    if(data.html =="  "){

                        jQuery('.ajax-load').html("No more records found");

                        return true;

                    }

                    jQuery('.ajax-load').hide();

                    jQuery("#post-data").append(data.html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    // alert('server not responding...');

                });

        }

    </script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\jubarvai_blog_project\resources\views/website/category.blade.php ENDPATH**/ ?>
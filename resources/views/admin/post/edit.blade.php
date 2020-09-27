@extends('layouts.master')
@section('pageTitle')
    Update Product
@endsection
@section('mainContent')
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">


        <div class="col-sm-offset-0 col-md-12">


            <form name="product" action="{{ url('admin/post/update') }}/{{ $product->post_id }}"
                  class="form-horizontal"
                  method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="box box-primary" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #bdbdbf;">
                        <h3 class="box-title">Basic Post Information</h3>
                    </div>
                    <div class="box-body" style="padding: 22px;">

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label for="post_title">Product Title<span
                                            class="required">*</span></label>
                                    <input required type="text" class="form-control the_title"
                                           name="post_title" id="post_title"
                                           value="{{ $product->post_title }}" autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="post_name">Permalink<span class="required">*</span></label>
                                    <input required type="text" class="form-control the_name"
                                           name="post_name" id="post_name"
                                           value="{{ $product->post_name }}" autocomplete="off">
                                    <p id="produtctError"></p>
                                </div>


                                <div class="form-group ">
                                    <label for="post_name">Description<span class="required">*</span></label>

                                    <textarea class="form-control ckeditor" rows="10" name="post_description"
                          id="post_description">{{ $product->post_description }}</textarea>
                                </div>
                                <input type="hidden" class="form-control"
                                       name="folder" id="folder"
                                       value="{{ $product->folder }}">




                                <div class="form-group featured-image">
                                    <label>Featured Image<span class="required">* Size(800*800)</span></label>
                                    <img width="50"
                                        src="<?=url('/')?>/public/uploads/<?php echo $product->folder;?>/thumb/<?php echo $product->feasured_image;?>">

                                    <input type="file" class="form-control" name="featured_image"/>

                                </div>

                                <div class="form-group ">
                                    <label for="product_availability"> Published
                                        Status</label>
                                    <select name="status"
                                            class="form-control">
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
                                </div>
                            </div>



                        </div>


                    </div>


                </div>


                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary" style="border: 2px solid #ddd;">
                                <div class="box-header" style="background-color: #bdbdbf;">

                                    <h3 class="box-title">Post Categories<span class="required">*</span></h3>
                                </div>
                                <div class="box-body" style="padding: 22px;height: 450px;overflow: scroll">
                                    <div class="form-group">
                                        <?php




                                        if (isset($categories)) {
                                        foreach ($categories as $category) {


                                        $subCategory_id = $category->category_id;


                                        ?>
                                        <input type="checkbox"

                                               <?php foreach ($product_categories as $product_category) {
                                                   if ($product_category->category_id == $category->category_id) {
                                                       echo "checked";
                                                   } else {
                                                       echo "";
                                                   }

                                               }
                                               ?>
                                               name="category_id[]" value="<?php echo $category->category_id;?>">
                                        <span><?php echo $category->category_title;?></span>
                                        <br>


                                        <?php




                                        }


                                        }


                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>




                    <div class="box box-primary" style="border: 2px solid #ddd;">
                        <div class="box-header" style="background-color: #bdbdbf;">

                            <h3 class="box-title">SEO Options</h3>
                        </div>


                        <div class="box-body" style="padding: 22px; ">
                            <div class="form-group  ">
                                <label for="seo_title"> Title</label>
                                <input type="text" class="form-control" name="seo_title" id="seo_title"
                                       value="{{ $product->seo_title }}">
                            </div>


                            <div class="form-group  ">
                                <label for="seo_content">Meta description</label>
                                <textarea class="form-control" rows="5" name="seo_content"
                                          id="seo_content">{{ $product->seo_content }}</textarea>
                            </div>

                            <div class="form-group  ">
                                <label for="seo_keywords">Meta Keywords</label>

                                <input type="text" class="form-control" name="seo_keywords" id="seo_title"
                                       value="{{ $product->seo_keywords }}">


                            </div>
                        </div>
                    </div>
                    <div class="box-footer">

                        <button type="submit" class="btn btn-success pull-right">Post Update</button>
                    </div>
                </div>


            </form>

        </div>
    </div>

    <script>

        document.forms['product'].elements['status'].value = "{{ $product->status }}";


    </script>

    <script>
        $(document).ready(function () {
            $("#category_title").on('input click', function () {
                var text = $("#category_title").val();
                var _token = $("input[name='_token']").val();

                var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $("#category_name").val(word);
                $.ajax({
                    data: {url: word, _token: _token},
                    type: "POST",
                    url: "{{url('category-urlcheck')}}",
                    success: function (result) {

                        // $('#categoryError').html(result);
                        var str2 = "es";
                        var word = $("#category_name").val(word);
                        if (result) {
                            var text = $("#category_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            var word = word.concat(str2);
                            $("#category_name").val(word);

                        } else {
                            var text = $("#category_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            $("#category_name").val(word);
                        }
                    }
                });
            });


        });
    </script>


@endsection



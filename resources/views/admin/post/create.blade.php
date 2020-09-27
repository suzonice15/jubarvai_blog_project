@extends('layouts.master')
@section('pageTitle')
    Add New Product
@endsection
@section('mainContent')
    <style>
        .required {
            color: red;
            font-size: 16px;
            padding-top: 19px;
        }
    </style>
    <div class="box-body">


        <form action="{{ url('admin/post/store') }}" class="form-horizontal" method="post"
              enctype="multipart/form-data">
            @csrf

            <div class="box-body">


                <div class="box box-primary" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #bdbdbf;">
                        <h3 class="box-title">Basic Post Information</h3>
                    </div>
                    <div class="box-body" style="padding: 22px;">

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label for="post_title">Post Title<span
                                            class="required">*</span></label>
                                    <input required type="text" class="form-control the_title"
                                           name="post_title" id="post_title"
                                           value="" autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="post_name">Permalink<span class="required">*</span></label>
                                    <input required type="text" class="form-control the_name"
                                           name="post_name" id="post_name"
                                           value="" autocomplete="off">
                                    <p id="produtctError"></p>
                                </div>
                                <input type="hidden" class="form-control"
                                       name="folder" id="folder"
                                       value="">


                                <div class="form-group ">
                                    <label for="post_name">Post description<span class="required">*</span></label>

                                    <textarea class="form-control ckeditor" rows="10" name="post_description"
                                              id="post_description"></textarea>
                                </div>

                                <div class="form-group featured-image">
                                    <label>Featured Image<span class="required">* Size(700*700)</span></label>
                                    <input required type="file" class="form-control" name="featured_image"/>

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


                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary" style="border: 2px solid #ddd;">
                            <div class="box-header" style="background-color: #bdbdbf;">

                                <h3 class="box-title">Categories<span class="required">*</span></h3>
                            </div>
                            <div class="box-body" style="padding: 22px;">
                                <div class="form-group">
                                    <?php




                                    if (isset($categories)) {
                                    foreach ($categories as $category) {




                                    ?>
                                    <input type="checkbox" name="category_id[]"
                                           value="<?php echo $category->category_id;?>">
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
                                   value=" ">
                        </div>


                        <div class="form-group  ">
                            <label for="seo_content">Meta description</label>
                            <textarea class="form-control" rows="5" name="seo_content"
                                      id="seo_content"> </textarea>
                        </div>

                        <div class="form-group  ">
                            <label for="seo_keywords">Meta Keywords</label>

                            <input type="text" class="form-control" name="seo_keywords" id="seo_title"
                                   value=" ">


                        </div>
                    </div>
                </div>
                <div class="box-footer">

                    <button type="submit" class="btn btn-success pull-right">Post Save</button>
                </div>
            </div>


        </form>

    </div>


    <script>
        $(document).ready(function () {
            $("#post_title").on('input click', function () {
                var text = $("#post_title").val();
                var _token = $("input[name='_token']").val();

                var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $("#post_name").val(word);
                $.ajax({
                    data: {url: word, _token: _token},
                    type: "POST",
                    url: "{{route('post.urlcheck')}}",
                    success: function (result) {

                        // $('#categoryError').html(result);
                        var str2 = "es";
                        var word = $("#post_name").val(word);
                        if (result) {
                            var text = $("#post_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            var word = word.concat(str2);
                            $("#post_name").val(word);

                        } else {
                            var text = $("#post_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            $("#post_name").val(word);
                        }
                    }
                });
            });


        });
    </script>

    <script>
        $(document).ready(function () {
            $("body").on('mousemove', function () {

                var _token = $("input[name='_token']").val();


                $.ajax({
                    data: {_token: _token},
                    type: "POST",
                    url: "{{route('post.foldercheck')}}",
                    success: function (result) {
                        $('#folder').val(result);
                    }
                });
            });


        });
    </script>

     

@endsection



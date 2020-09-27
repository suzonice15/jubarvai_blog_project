@extends('layouts.master')
@section('pageTitle')
    Update Default Website Information
@endsection
@section('mainContent')
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">


        <div class="col-sm-offset-0 col-md-12">
            <form  name="category" action="{{ url('admin/default/setting')  }}" class="form-horizontal"
                  method="post"
                  enctype="multipart/form-data">
                @csrf


                <div class="box" style="border: 2px solid #ddd;">
                    <div class="box-header with-border" style="background-color: green;color:white;">
                        <h3 class="box-title">Default Website  Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="padding: 28px;">
                        <div class="form-group ">
                            <label for="site_title">Site Title</label>
                            <input type="text" class="form-control" name="site_title" id="site_title"
                                   value="{{$setting_row->site_title}}">
                        </div>




                        <div class="form-group">
                            <label>logo size(1300 * 400)</label>

                           <img width="50" src="{{url('/')}}/public/uploads/{{$setting_row->logo}}">
                            <input type="file" class="form-control" name="logo">

                        </div>


                        <div class="form-group">
                            <label>Icon size(1300 * 400)</label>

                            <img width="50" src="{{url('/')}}/public/uploads/{{$setting_row->icon}}">
                            <input type="file" class="form-control" name="icon">

                        </div>



                        <div  class="form-group ">
                            <label for="footer">Adress</label>
                            <textarea class="form-control" rows="9"
                                      name="address"><?= get_option('address') ?></textarea>
                        </div>

                    </div>
                </div>




                <div class="box-footer">
                    <input type="submit" class="btn btn-success pull-left" value="Update">

                </div>
            </form>


            </form>
        </div>
    </div>


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



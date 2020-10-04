@extends('website.master')
@section('mainContent')




    <section class="">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8">
                        <span id="post-data">

                               @include('website.category_ajax')
                        </span>


                    </div>

                </div>

            </div>


        </div>
    </section>



    <input type="hidden"  id="category_name" name="category_name" value="{{$category_name}}">


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
                    url:"{{url('/ajax_category')}}?page="+page+"&category_name="+category_name,
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




@endsection

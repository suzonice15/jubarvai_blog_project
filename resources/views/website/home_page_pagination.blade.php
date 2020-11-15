
<?php
if($posts){

foreach ($posts as $sidebar) {
?>

<div class="home_page_post" >
    <a href="{{url('/')}}/{{$sidebar->post_name}}">
        <img class="img-responsive"
             style="background-color: #ddd;
padding: 4px;width:118%
" src="{{ url('/public/uploads') }}/{{ $sidebar->folder }}/thumb/{{ $sidebar->feasured_image }}" alt="">
    </a>

    <a class="home_page_title"  href="{{url('/')}}/{{$sidebar->post_name}}">{{$sidebar->post_title}}</a>

</div>


<?php }

}

?>



<br/>




<div class="col-sm-12 col-md-12" style="float:left">

    {!! $posts->links() !!}
</div>

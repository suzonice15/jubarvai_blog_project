

@extends('website.master')
@section('mainContent')

<div class="container">
<br/>
    <div class="row">



        <div class="col-md-12">

            <article class="txt">

               <?php echo $page->page_content; ?>
            </article>
        </div>


    </div>

</div>

@endsection

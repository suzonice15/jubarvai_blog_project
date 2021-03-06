
    @include('layouts.includes.header');
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->

    @include('layouts.includes.sidebar');


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
        @if(Session::has('success'))
            <div class="callout callout-success">


                <h4>
                    {{ Session::get('success')}}

                </h4>
            </div>
        @elseif(Session::has('error'))
            <div class="callout callout-danger">

                <h4>
                    {{ Session::get('error')}}

                </h4>
            </div>
        @else


        @endif



      <!-- Default box -->
      <div class="box box-success">
          @yield('mainContent')

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

@include('layouts.includes.footer');

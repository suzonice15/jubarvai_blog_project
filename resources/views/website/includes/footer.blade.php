

<footer class="bg-191 pos-relative color-ccc bg-primary pt-50">
    <div class="abs-tblr pt-50 z--1 text-center">
        <div class="h-80 pos-relative"><div class="bg-map abs-tblr opacty-1"></div></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                
                
               <div class="pr-10 pr-sm-0">
                    <h5 class="f-title"><b>RECENT POST</b></h5>
                    <?php
                    $sidebars=DB::table('post')
                        ->select('post_title','post_name','modified_time','visitor','folder','feasured_image')
                        ->where('status',1)->orderBy('post_id','desc')->paginate(2);
                    ?>
                    <?php
                    if($sidebars){

                        foreach ($sidebars as $sidebar) {
                            ?>
                    <div class="sided-80x mb-30">
                        <a class="s-left" href="#">
                            <img src="{{ url('/public/uploads') }}/{{ $sidebar->folder }}/thumb/{{ $sidebar->feasured_image }}" alt="">
                        </a><!-- s-left -->

                        <div class="s-right pl-10">
                            <h5><a href="#"><b>{{$sidebar->post_title}}</b></a></h5>
                            <ul class="mtb-5 list-li-mr-20 color-ash">
                                <li><i class="mr-5 font-12 ion-clock"></i>{{ date("M d Y",strtotime($sidebar->modified_time)) }}</li>
                                <li><i class="mr-5 font-12 ion-eye"></i>{{$sidebar->visitor}}</li>
                            </ul>
                        </div><!-- s-left -->
                    </div><!-- sided-80x -->

                    <?php }
                    }?>


                </div>
                
               
               
                
            
            </div><!-- col-sm-2 -->


            <div class="col-lg-4 col-md-4 col-sm-4">
                
                
                <h5 class="f-title"><b>Recent Category</b></h5>
                <ul class="mb-30 list-hover list-block list-a-ptb-5">
                    <?php
                    $categorys=DB::table('category')
                        ->select('category_title','category_name')
                        ->where('status',1)->orderBy('category_id','desc')->paginate(6);
                    ?>
                    <?php
                    if($categorys){

                    foreach ($categorys as $category) {
                    ?>
                    <li><a href="{{url('/')}}/category/{{$category->category_title}}">{{$category->category_title}}</a></li>


                    <?php }} ?>               </ul>
            </div>
            
            
            
            <!-- col-sm-2 -->
            
            
            

            <div class="col-lg-4 col-md-8 col-sm-8">
                
                
                 <h5 class="f-title"><b>Begambleaware </b></h5>
                <address><h5> TopBettingSite24.com Copyright © 2019 - 2020.
Topbettingsite24.com does not offer betting services. Data and information are provided for informational and entertainment purposes only, and are not intended for investment or other purposes. Playing real money carries high level of financial risk and may cause you financial problems. If you have gambling addiction problems we recommend you to visit <a href="https://www.gamcare.org.uk/" target="_blank">www.gamcare.org.uk</a> Or <a href="https://www.begambleaware.org/" target="_blank">www.begambleaware.co.uk</a> and ask for help.</h5>
                   <h3 style="color:red">Gamble responsibly 18+</h3>

                </address>
                
                
                
                
                
                
                
                
                <!--pr-10 -->
            </div><!-- col-sm-4 -->

        </div><!-- row -->

        <div class="mt-20 brdr-ash-1 opacty-4"></div>


    </div><!-- container -->

    <div class="bg-dark-primary ptb-15 text-left">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12 col-md-12">
                    <p class="text-md-center font-9 pt-5 mtb-5"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright 2019 -<script>document.write(new Date().getFullYear());</script> 
                       devoloped by <a href="https://topbettingsite24.com/">Top betting site 24</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div><!-- col-sm-3 -->
<br/><br/><br/><br/><hr/>
            </div><!-- row -->

        </div><!-- container -->
    </div><!-- container -->
</footer>
<!-- SCIPTS -->



<script src="{{ asset('assets/font_end')}}/plugin-frameworks/tether.min.js"></script>

<script src="{{ asset('assets/font_end')}}/plugin-frameworks/bootstrap.js"></script>

<script src="{{ asset('assets/font_end')}}/common/scripts.js"></script>
<script src="{{ asset('assets/font_end')}}/sharetastic.js"></script>


</body>
</html>

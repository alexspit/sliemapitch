<?php 
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    $_SESSION["current_page"] = "index";
    
$title = "Sliema Pitch Restaurant & Lounge | Home page";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "Sliema, Pitch, Food, Restaurant, Lounge, Italian";
include 'header.php';


?>



<!--==============================content=================================-->

<div id="content">
   
    <!--==============================slider=================================-->   
    <div class="bgslider"> 
        <div class="slider">
            <div class="camera_wrap">
                  <div data-src="img/slider/picture1.jpg">
                  </div>
                  <div data-src="img/slider/picture2.jpg">
                  </div>
                  <div data-src="img/slider/picture3.jpg">
                  </div>
            </div>
        </div>
    </div>
    <!--==============================row_1=================================-->   
    <div class="container">
        <div class="row_1"> 
        <h2>Our Specialities </h2>
            <div class="row">
                <ul class="list1">
                    <li class="col-lg-3 col-md-3 col-sm-3  col-xs-6 collist1">
                        <figure><a href="img/page1_bigimg1.jpg" class="thumb"><img src="img/page1_img1.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist1">
                        <figure><a href="img/page1_bigimg2.jpg" class="thumb"><img src="img/page1_img2.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist1">
                        <figure><a href="img/page1_bigimg3.jpg" class="thumb"><img src="img/page1_img3.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist1">
                        <figure><a href="img/page1_bigimg4.jpg" class="thumb"><img src="img/page1_img4.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================row_2=================================-->   
    <div class="row_2 hidden-xs"> 
        <div class="container">
            <div class="row">
                <ul class="list1">
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hidden-xs collist1">
                        <figure><a href="img/page1_bigimg5.jpg" class="thumb"><img src="img/page1_img5.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hidden-xs collist1">
                        <figure><a href="img/page1_bigimg6.jpg" class="thumb"><img src="img/page1_img6.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hidden-xs collist1">
                        <figure><a href="img/page1_bigimg7.jpg" class="thumb"><img src="img/page1_img7.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hidden-xs collist1">
                        <figure><a href="img/page1_bigimg8.jpg" class="thumb"><img src="img/page1_img8.jpg" alt=""><span><em></em></span></a></figure>
                        <strong>Dolore ipsum</strong>
                        <a href="#">Dolore ipsum</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================row_3=================================-->   
    <div class="row_3"> 
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 colrow3">
                    <h2 class="white">shortly about us</h2>
                    <h3>Mes cuml dia sed inenias ingerto lot aliiqtes dolore ipsum.</h3>
                    <p>Mes cuml dia sed in lacus ut eniascet ingerto aliiqt es site amet eismod ictor ut ligulate ameti dapibus ticdu nt mtsen lusto dolor ltissim com. Mes cuml dia sed inertio.</p>
                    <p class="lheight2">Nemo enim ipsam voluptatem voluptas sit. Aspernatur aut odit aut fugit sed quia consequuntur magni dolores eosqui rationevoluptatem nesciunt lacusueni.  Ascet dolingerto aliiqt sit amet eism com odictor ut.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 colrow3">
                    <h2 class="white">What's New?</h2>
                      <ul class="list-news">
                        <li class="">
                         <div class="badge badge_2"><em></em><p class="badgetxt">11<span>dec</span></p></div>
                            <div class="overflow">
                                <h3><a href="#">sed inenias cet dolor.</a></h3>
                                <p>Mes cuml dia sed in lacus ut eniascet ing erto aliiqt es site amet eismod ictor dolorut. Ligulate ameti dapibus ticdu nut.</p>
                            </div>
                        </li>
                        <li class="">
                         <div class="badge badge_2"><em></em><p class="badgetxt">14<span>dec</span></p></div>
                            <div class="overflow">
                                <h3><a href="#">mod ictor utli ipsum. </a></h3>
                                <p>Mes cuml dia sed in lacus ut eniascet ing erto aliiqt es site amet eismod ictor dolorut. Ligulate ameti dapibus ticdu nut.</p>
                            </div>
                        </li>
                      </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 colrow3">
                    <h2 class="white">OPENING HOURS</h2>
                    <ul class="list2">
                        <li>
                            <a href="#"><span>BREAKFAST:</span><strong>8AM - 11AM</strong><em></em></a>
                        </li>
                        <li>
                            <a href="#"><span>LUNCH:</span><strong>12AM - 12PM</strong><em></em></a>
                        </li>
                        <li>
                            <a href="#"><span>DINNER:</span><strong>8PM - 11PM</strong><em></em></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
</div>
<!--==============================footer=================================-->
<?php 
include 'footer.php';
?>
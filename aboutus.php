<?php 
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    $_SESSION["current_page"] = "aboutus";
    
    $title = "About Us | Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "About, Sliema, Pitch, Food, Restaurant, Lounge, Italian";
include 'header.php';
?>


<!--==============================content=================================-->
<div id="content">
    <!--==============================row_4=================================--> 
    <div class="row_4">  
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 who">
                    <h2>Who we are</h2>
                    <figure><img src="img/page2_img1.jpg" alt=""></figure>
                    <h3 class="red">Nullam tempor aliquam metus, quis ultrices nulla faucibus.</h3>
                    <p>Site amet eismod ictor ut ligulate ameti dapibus ticdu nt mtsen lusto dolor ltissim com. Mes cuml dia sed inertio. Lacusueni ascet dolingerto aliiqt sit amet eism com odictor ut ligulate cot ameti dapibu. Nemo enim ipsam volu.</p>
                    <p class="mbot1">Nemo enim ipsam voluptatem voluptas sit. Aspernatur aut odit aut fugit sed quia consequuntur magni dolores eosq ui rati onevoluptatem nesciunt lacusueni.  Ascet dolingerto aliiqt sit amet eism com odictor ut. Ligulate cotameti. </p>
                    <a href="#" class="btn-link btn-link1">read more</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2 class="green">our history</h2>
                    <ul class="list4">
                        <li>
                            <p><span>1998 -</span> Vertyu erauas aitaesa ertyasneo eniptaiades. volernatur aut oditaut. onsequuntur magni dolores eo qui ratione voluptate msequi nesci. neque porro quisquam est.</p>
                        </li>
                        <li>
                            <p><span>2001 -</span> Neque porro quisquam est. Qui dolorem ipsum, quia dolor sit, amet, consectetur, isci velit, sed quia non numquam eius modiinci dunt, ut labore et dolore magnam aliquam.</p>
                        </li>
                        <li>
                            <p><span>2007 -</span> Volernatur aut oditaut. onsequuntur magni dolores eo qui ratione volup msequi nesci porro quisquam est qui dolorem ipsum.</p>
                        </li>
                        <li>
                            <p><span>2010 -</span> Ratione voluptate msequi nesciporro uisquam est. Ipsum, quia dolor sit amet sectetur.</p>
                        </li>
                        <li>
                            <p><span>2011 -</span> Ipsum, quia dolor sit amet. Sectetur, adipisci velit, sed quia non numquam eius modi. incidunt, ut labore et dolore magnam aliquam quaerat voluptatem ut enim ad minima. </p>
                        </li>
                        <li>
                            <p><span>2013 -</span> Incidunt, ut labore et dolore magnam aliqua mquaerat voluptatem. ut enim ad minima veniam, quis nostrum exercitationem. </p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>opportunities</h2>
                    <h3 class="red">Lorem ipsum dolor sit amet, consec tetuer adipiscing.</h3>
                    <p>Mes cuml dia sed inertio. Lacusueni ascet dolingerto aliiqt sit amet eism com odict or ut ligulate cot ameti dapibu. Nemo enim ipsam volu. atem voluptas sit. Aspernatur aut odit aut fugit sed quia consequuntur magni dolores eos qui rationevoluptatem nesciunt. Neque poes cuml dia sed in lacusut eniascet ingerto aliiqt es site amet.</p>
                    <ul class="list5">
                        <li><em><img src="img/arrow1.png" alt=""></em><p><a href="#">Phasellllus porta totdus</a></p></li>
                        <li><em><img src="img/arrow1.png" alt=""></em><p><a href="#">Fusce suscipit varius mium sociis </a></p></li>
                        <li><em><img src="img/arrow1.png" alt=""></em><p><a href="#">Magis dis parturient montes nascetur</a></p></li>
                        <li><em><img src="img/arrow1.png" alt=""></em><p><a href="#">Lorem ipsum dolor sitat consec tetuer adip</a></p></li>
                        <li><em><img src="img/arrow1.png" alt=""></em><p><a href="#">Praesent vestibulum molestie lacus</a></p></li>
                        <li><em><img src="img/arrow1.png" alt=""></em><p><a href="#">Aenean non ummy</a></p></li>
                    </ul>   
                    <p>Phasellllus. porta. Fusce suscipit varius mium sociis tot dnatibus et magis dis parturient montes, nascetur ridicul us mus. Lorem ipsum dolor sitat, consec tetuer adipiscing. Praesent vestibulum molestie lacus. Aenean non ummy. </p>  
                </div>
            </div>
        </div>
    </div>

    <!--==============================row_5=================================-->   
    <div class="row_5"> 
        <div class="container">
        <h2>our team</h2>
            <div class="row">
                <ul class="list6">
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page2_bigimg2.jpg" class="thumb"><img src="img/page2_img2.jpg" alt=""><span><em></em></span></a></figure>
                        <h3><a href="#">Temp Name</a></h3>
                        <p>Site amet eismod ictor ut ligulate ameti dapibus ticdu nt mtsen lusto dolor.</p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page2_bigimg3.jpg" class="thumb"><img src="img/page2_img3.jpg" alt=""><span><em></em></span></a></figure>
                        <h3><a href="#">Temp Name</a></h3>
                        <p>ltissim com. Mes cuml dia sed inertio. Lacusueni ascet dolingerto aliiqt sit amet.</p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page2_bigimg4.jpg" class="thumb"><img src="img/page2_img4.jpg" alt=""><span><em></em></span></a></figure>
                        <h3><a href="#">Temp Name</a></h3>
                        <p>Ascet dolingerto aliiqt sit amet eism com odict or ut ligulate cot ameti dapibu.</p>   
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page2_bigimg5.jpg" class="thumb"><img src="img/page2_img5.jpg" alt=""><span><em></em></span></a></figure>
                        <h3><a href="#">Temp Name</a></h3>
                        <p>Nemo enim ipsam voluatem voluptas sit. Aspernatur aut odit aut fugit sed.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>  
    <!--==============================row_6=================================-->
    <div class="row_6">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2 class="white">Advantages</h2>
                    <ul class="list7">
                        <li>
                            <img src="img/page2_icon1.png" alt="">
                            <h3><a href="#">sed inenias cet dolor.</a></h3>
                            <p>Mes cuml dia sed in lacus ut eniascet ing erto aliiqt es site amet eismod ictor dolorut.</p>
                        </li>
                        <li>
                            <img src="img/page2_icon2.png" alt="">
                            <h3><a href="#">inger lot aliiqtes.</a></h3>
                            <p>Aliiqt es site amet eismod ictor dolorut. Ligulate ameti dapibus ticdu nut.</p>
                        </li>
                        <li class="last">
                            <img src="img/page2_icon3.png" alt="">
                            <h3><a href="#">sed inenias cet dolor.</a></h3>
                            <p>Mtsen lusto dolor ltissim comes cuml dia sed. Inertio lacusueni ascet dolingerto.</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h2 class="white">Skills</h2>
                    <h3 class="mbot2">Nullam tempor aliquam metus, quis ultrices. </h3>
                    <p>Site amet eismod ictor ut ligulate ameti dapibus ticdu nt mtsen lusto dolor ltissim com. Mes cuml dia sed inertio. Lacusueni ascet dolingerto aliiqt sit amet eism.</p>
                    <ul class="list8">
                        <li><em><img src="img/arrow2.png" alt=""></em><p><a href="#">Phasellllus porta totdus</a></p></li>
                        <li><em><img src="img/arrow2.png" alt=""></em><p><a href="#">Fusce suscipit varius mium sociis</a></p></li>
                        <li><em><img src="img/arrow2.png" alt=""></em><p><a href="#">Magis dis parturient montes nascetur</a></p></li>
                        <li><em><img src="img/arrow2.png" alt=""></em><p><a href="#">Lorem ipsum dolor sitat consec </a></p></li>
                    </ul>   
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 testimonials">
                    <h2 class="white padbot1">Our chef</h2>
                    <figure><img src="img/page2_img6.jpg" alt=""></figure>
                    <div class="textinfo2">
                        <p>&ldquo;Lorem ipsum dolor sit amet, consec tetuer adipiscing. Praesent vestibu lum molestie. lacuiirhs enean non ummy. Phasellllus. porta. Fusce suscipit varius mium sociis totdnatibus et magis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sitat, consec tetuer adipiscing elit...&rdquo;</p>
                        <strong>Chef</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php 
include 'footer.php';
?>
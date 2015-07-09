<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    $_SESSION["current_page"] = "menu";
    
     $title = "Menu | Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "Menu, Sliema, Pitch, Food, Restaurant, Lounge, Italian";
include 'header.php';
include 'data_class/menu_item.php';

$menu = new menu_item();

?>

<!--==============================content=================================-->
<div id="content">
    <!--==============================row_7=================================-->   
    
     
             
        <ul class="list9 visible-lg" id="tostick">
                    <li class="col-lg-1  collist6">
                        <figure><a href="img/page3_bigimg1.jpg" class="thumb"><img src="img/page3_img1.jpg" alt=""><span><em></em></span></a></figure>
                        <h3>Featured</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg2.jpg" class="thumb"><img src="img/page3_img2.jpg" alt=""><span><em></em></span></a></figure>
                         <h3>Starters</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg3.jpg" class="thumb"><img src="img/page3_img3.jpg" alt=""><span><em></em></span></a></figure>
                         <h3>Apitizers</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg4.jpg" class="thumb"><img src="img/page3_img4.jpg" alt=""><span><em></em></span></a></figure>
                        <h3>Pasta</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg3.jpg" class="thumb"><img src="img/page3_img3.jpg" alt=""><span><em></em></span></a></figure>
                         <h3>Pizza</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg4.jpg" class="thumb"><img src="img/page3_img4.jpg" alt=""><span><em></em></span></a></figure>       
                         <h3>Salads</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg1.jpg" class="thumb"><img src="img/page3_img1.jpg" alt=""><span><em></em></span></a></figure>
                        <h3>Meat</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg2.jpg" class="thumb"><img src="img/page3_img2.jpg" alt=""><span><em></em></span></a></figure>
                         <h3>Fish</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg3.jpg" class="thumb"><img src="img/page3_img3.jpg" alt=""><span><em></em></span></a></figure>
                         <h3>Desserts</h3>
                    </li>
                    <li class="col-lg-1  collist6">
                        <figure><a href="img/page3_bigimg4.jpg" class="thumb"><img src="img/page3_img4.jpg" alt=""><span><em></em></span></a></figure>   
                        <h3>Platters</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg3.jpg" class="thumb"><img src="img/page3_img3.jpg" alt=""><span><em></em></span></a></figure>
                         <h3>Breads</h3>
                    </li>
                    <li class="col-lg-1 collist6">
                        <figure><a href="img/page3_bigimg4.jpg" class="thumb"><img src="img/page3_img4.jpg" alt=""><span><em></em></span></a></figure>       
                         <h3>Breakfast</h3>
                    </li>
        </ul>
     
        <div class="row_7"> 
              <div class="container">
        <div id="menuitems">
            
                

                <?php echo $menu->getMenuItemsFrontEnd();

?>
            
        </div>
            
        
           <!--<div class="row">
                
               
         <ul id="tostick" class="ch-grid">
					<li>
						<a href="#pizza">
						<div class="ch-item ch-img-1">
							<div class="ch-info">
								<h3>Pizza</h3>
								
							</div>
						</div>
						</a>
					</li>
					<li>

						<div class="ch-item ch-img-2">
							<a href="#Meat">
                                                            <div class="ch-info">
                                                                <h3>Meat</h3>
                                                            </div>
                                                        </a>
						</div>
						
					</li>
					<li>
					<a href="#panini">
						<div class="ch-item ch-img-3">
							<div class="ch-info">
								<h3>Panini</h3>
								
							</div>
						</div>
						</a>
					</li>
				</ul>
         
                <ul class="list9">
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg1.jpg" class="thumb"><img src="img/page3_img1.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Morbi a facilisis</h3>
                        <p><a href="#">&euro; 12.99</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg2.jpg" class="thumb"><img src="img/page3_img2.jpg" alt=""><span><em></em></span></a></figure>
                        <h3>Nullam eget arcu</h3>
                        <p><a href="#">&euro; 9.99</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg3.jpg" class="thumb"><img src="img/page3_img3.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Aliquam maleada</h3>
                        <p><a href="#">&euro; 17.05</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg4.jpg" class="thumb"><img src="img/page3_img4.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Malesuada lorem</h3>
                        <p><a href="#">&euro; 9.99</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6 clearfix">
                        <figure><a href="img/page3_bigimg5.jpg" class="thumb"><img src="img/page3_img5.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Integer sit amet</h3>
                        <p><a href="#">&euro; 12.99</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6 clearfix">
                        <figure><a href="img/page3_bigimg6.jpg" class="thumb"><img src="img/page3_img6.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Nullam eget arcu</h3>
                        <p><a href="#">&euro; 9.99</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg7.jpg" class="thumb"><img src="img/page3_img7.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Pelteue molest</h3>
                        <p><a href="#">&euro; 17.05</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg8.jpg" class="thumb"><img src="img/page3_img8.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Malesuada lorem</h3>
                        <p><a href="#">&euro; 9.99</a></p>
                    </li>
                   <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg9.jpg" class="thumb"><img src="img/page3_img9.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Morbi a facilisis</h3>
                        <p><a href="#">&euro; 12.99</a></p>
                    </li>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg10.jpg" class="thumb"><img src="img/page3_img10.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Nullam eget arcu</h3>
                        <p><a href="#">&euro; 9.99</a></p>
                    </li>
                     <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg10.jpg" class="thumb"><img src="img/page3_img10.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Nullam eget arcu</h3>
                        <p><a href="#">&euro; 9.99</a></p>
                    </li>
                     <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 collist6">
                        <figure><a href="img/page3_bigimg10.jpg" class="thumb"><img src="img/page3_img10.jpg" alt=""><span><em></em></span></a></figure>
                        <h3 class="maxheight">Nullam eget arcu</h3>
                        <p><a href="#">&euro; 9.99</a></p>
                    </li>
                </ul>
                
                
            </div>-->
        
        </div>
    </div>  

</div>
<?php

include 'footer.php';
?>
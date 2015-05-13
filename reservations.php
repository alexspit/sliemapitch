<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    $_SESSION["current_page"] = "reservations";
    
     $title = "Reservations | Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "reservations, Booking, Sliema, Pitch, Food, Restaurant, Lounge, Italian";
include 'header.php';
?>

<!--==============================content=================================-->
<div id="content">
    <!--==============================row_9=================================-->   
    <div class="row_9"> 
        <div class="container">
                    <!--==============================modal=================================-->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="mybookingModalLabel">Booking Warning</h4>
      </div>
      <div class="modal-body">
         
          
          <p style="text-align: left">This site is still in Beta phase so please note that even if the booking functionality works, we are currently not accepting reservations made through the website.</p>
              
        </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Got it</button>
      </div>
    </div>
  </div>
</div>
<!--==============================modal=================================-->
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 id="booking">Reservations</h2>
                        
                </div>  
             </div> 
             <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 padbot3">
                    <h3 class="padbot3 red">Opening Hours</h3>
                    <ul class="list2">
                        <li>
                            <a href="#"><span>Breakfast:</span><strong>10:00 - 12:00</strong><em></em></a>
                        </li>
                        <li>
                            <a href="#"><span>Lunch:</span><strong>12:00 - 16:00</strong><em></em></a>
                        </li>
                        <li>
                            <a href="#"><span>Dinner:</span><strong>19:00 - 23:00</strong><em></em></a>
                        </li>
                        <li>
                            <a href="#"><span>Pizzeria:</span><strong>19:30 - 23:00</strong><em></em></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <h3 class="padbot3 red">Book a table</h3>
                    <form id="contact-form" class="contact-form" action="process_data/add_booking.php" method="post">
                      <div class="success-message">Contact form submitted.</div>
                    
                      <div class="row">
                          
                            <div class="col-lg-4 col-md-12 col-sm-6 coll-1">
                                    <!--[if lt IE 10]>
                                        <h3 class="red">Name</h3>
                                    <![endif]-->
                                    <input name="name" type="text" placeholder="Name*:" required/>


                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-6 coll-1">
                                <label class="date">
                                 
                                    <!--[if lt IE 10]>
                                        <h3 class="red">Date and Time</h3>
                                    <![endif]-->
                                    <input name="datetime" type="datetime" id="datetimepicker" placeholder="Date and Time*:"  readonly required/>
                                  <span class="empty-message">*This field is required.</span>
                                  <span class="error-message">*This is not a valid date.</span>
                                </label>
                            </div>
                             <div class="col-lg-4 col-md-12 col-sm-6 coll-1">
                                <label class="number">
                                    <!--[if lt IE 10]>
                                        <h3 class="red">Number of Diners</h3>
                                    <![endif]-->
                                  <input name="number" type="number" placeholder="Number of Diners*:" min="1" max="50" data-constraints="@JustNumbers" required/>
                                  <span class="empty-message">*This field is required.</span>
                                  <span class="error-message">*This is not a valid number.</span>
                                </label>
                            </div>
                      
                                <div class="col-lg-4 col-md-12 col-sm-6 coll-2">
                                    <label class="email">
                                        <!--[if lt IE 10]>
                                        <h3 class="red">Email</h3>
                                    <![endif]-->
                                      <input name="email" type="email" placeholder="E-mail*:" data-constraints="@Required @Email" required/>
                                      <span class="empty-message">*This field is required.</span>
                                      <span class="error-message">*This is not a valid email.</span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-6 coll-2">
                                    <label class="phone">
                                        <!--[if lt IE 10]>
                                        <h3 class="red">Phone</h3>
                                    <![endif]-->
                                      <input name="phone" type="text" placeholder="Telephone*:" data-constraints="@JustNumbers" required/>
                                      <span class="empty-message">*This field is required.</span>
                                      <span class="error-message">*This is not a valid phone.</span>
                                    </label>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-6 coll-2">
                                    <label class="area">
                                    <!--[if lt IE 10]>
                                        <h3 class="red">Seating</h3>
                                    <![endif]-->
                                      <!--  <input list="area" placeholder="Seating Preference" name="area"/>
                                          <datalist id="area">
                                              <option value="Prime Side">
                                              <option value="Sea Side">
                                              <option value="Bar Side">
                                              <option value="Inside">
                                              <option value="Gallery">
                                              <option value="No Preference">
                                          </datalist>-->
                                        
                                        <select name="area">
                                             <option disabled selected style='display:none;'>Seating Preference:</option>
                                           
                                            <option>No Preference</option>
                                            <option>Prime Side</option>
                                            <option>Sea Side</option>
                                            <option>Bar Side</option>
                                            <option>Inside</option>
                                            <option>Gallery</option>
                                            
                                        </select>

                                      <span class="empty-message">*This field is required.</span>
                                      <span class="error-message">*This is not a valid phone.</span>
                                    </label>
                                </div>
                      </div>
            
                      
                                
                                          <label class="message">
                                              <!--[if lt IE 10]>
                                        <h3 class="red">Comment</h3>
                                    <![endif]-->
                                            <textarea id="reservations_textarea" class="animated" name="comment" placeholder="Comment:"></textarea>
                                            <span class="empty-message">*This field is required.</span>
                                            <span class="error-message">*The message is too short.</span>
                                          </label>
                    
                                  <!--<a href="#" data-type="submit" class="btn btn-primary btn1"><input type="submit" value="Book Table"/></a>-->
                                  <!--<a href="javascript:{}" data-type="submit" class="btn btn-primary btn1" onclick="document.getElementById('contact-form').submit(); return false;">  <input type="submit" value="Book Table"/></a>-->
                                    <button class="btn btn-primary" id="submit" type="submit" value="Book Table">Book Table</button>
                                  <!--<p class="req">*Required fields</p>-->

                                  <span id="message">
                                      <?php 
                                          if(isset($_SESSION["success"]) && !empty($_SESSION["success"]))
                                              {   echo "Booking done, please wait for email confirmation";  } 
                                          if(isset($_SESSION["errors"]))
                                          {                
                                             echo $_SESSION["errors"];
                                          }
                                              unset($_SESSION["success"]);
                                              unset($_SESSION["errors"]);
                                      ?>
                                  </span>
                             
                    </form>
                </div>
             </div> 
        </div>
    </div>  

</div>
<?php
include 'footer.php';
?>
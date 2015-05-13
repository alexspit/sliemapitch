<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    $_SESSION["current_page"] = "contact";
    
     $title = "Contact Us | Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "Contact, Sliema, Pitch, Food, Restaurant, Lounge, Italian";
include 'header.php';
?>

<!--==============================content=================================-->
<div id="content">
    <!--==============================row_9=================================-->   
    <div class="row_9"> 
        <div class="container">
            <div class="row">
                <div id="map" class="col-lg-12 col-md-12 col-sm-12 gmap">
                <h2>FIND US</h2>
                 <!-- <div class="map"><iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></div> -->
                 <div  class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.35363411701!2d14.50745321957396!3d35.91384317503654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfdb04be78e828395!2sSliema+Pitch!5e0!3m2!1sen!2s!4v1402171642645" width="600" height="450" frameborder="0" style="border:0"></iframe></div>
           
                </div>  
             </div> 
             <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 address">
                    <h2 class="padbot3">Contact Details</h2>
                    <address>
                        <div class="info">
                            <strong>Sliema Pitch<br>Tower Road,<br>Sliema, SLM145</strong>
                        	<p><span>Landline:</span> +356 79 272 729</p>
                        	<p><span>Mobile:</span> +356 79 272 729</p>                       	
                        	<p>E-mail: <a href="mailto:info@sliemapitch.com">info@sliemapitch.com</a></p>
                        </div>
                    </address>
                    
                </div>
                <div id="getintouch" class="col-lg-8 col-md-8 col-sm-8 address">
                    <h2 class="padbot3">get in touch</h2>
                    <form id="contact-form" class="contact-form <?php 
                                if(isset($_SESSION["customer_message_notification_email_sent"]) && !empty($_SESSION["customer_message_notification_email_sent"]))
                                    {   echo 'success';  }  ?>" action="process_data/message_process.php" method="post">
                      <div class="success-message">Contact form submitted successfully. We will get back to you as soon as possible.</div>
                       <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 coll-1">
                                <label class="name">
                                    <!--[if lt IE 10]>
                                        <h3 class="red">Name</h3>
                                    <![endif]-->
                                    <input id="name" name="name" type="text" placeholder="Name*:" required />
                                  <span class="empty-message">*This field is required.</span>
                                  <span class="error-message">*This is not a valid name.</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 coll-2">
                                <label class="email">
                                     <!--[if lt IE 10]>
                                        <h3 class="red">Email</h3>
                                    <![endif]-->
                                    <input id="email" name="email" type="email" placeholder="E-mail*:" required />
                                  <span class="empty-message">*This field is required.</span>
                                  <span class="error-message">*This is not a valid email.</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 coll-3">
                                <label class="phone">
                                    <!--[if lt IE 10]>
                                        <h3 class="red">Phone</h3>
                                    <![endif]-->
                                    <input id="phone" name="phone" type="text" placeholder="Telephone:" required/>
                                  <span class="empty-message">*This field is required.</span>
                                  <span class="error-message">*This is not a valid phone.</span>
                                </label>
                            </div>
                       </div>
                  <!--    <div class="row">
                          <div class="col-lg-12">-->
                                <label class="message">
                                    <!--[if lt IE 10]>
                                        <h3 class="red">Message</h3>
                                    <![endif]-->
                                    <textarea id="comment" class="animated" name="comment" placeholder="Comment*:" required></textarea>
                                  <span class="empty-message">*This field is required.</span>
                                  <span class="error-message">*The message is too short.</span>
                                </label>
                         <!-- </div>
                      
                      
                            <div class="col-lg-4 col-lg-offset-8 clearfix">-->
                              <!--<a href="#" data-type="submit" class="btn btn-primary btn1">submit</a>-->
                              <!--<input id="submit" type="submit" value="Submit"/>-->
                              <?php
                              if(isset($_SESSION["customer_message_notification_email_sent"]) && !empty($_SESSION["customer_message_notification_email_sent"])){
                                  echo ' <a href="contact.php"><button class="btn btn-primary" id="submitcontact" type="button" value="submit">Send another message</button></a>';
                              } else{?>
                              <button class="btn btn-primary" id="submitcontact" type="submit" value="submit">Send Message</button>
                              <?php }?>
                            <!--</div>  -->
                          
                      
                    </form>
                    </div>
                     <span id="message">
                            <?php 
                                
                                if(isset($_SESSION["errors"]))
                                {                
                                   echo $_SESSION["errors"];
                                }
                                    unset($_SESSION["customer_message_notification_email_sent"]);
                                    unset($_SESSION["errors"]);
                            ?>
                        </span>
                </div>
              <!--------------------------FAQS------------------------------------------------->
             <h2 id="faqs">Frequently Asked Questions</h2>
            <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Do you open during winter?
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          How can I book a sunbed?
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Can I watch football while I eat?
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
 
            <!--------------------------------------------------------------------------->
            
             </div> 
            
          
            
        </div>
    </div>  


<?php
include 'footer.php';
?>
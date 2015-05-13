<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    $_SESSION["current_page"] = "login";
    
     $title = "Log in | Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "Login, Sliema, Pitch, Food, Restaurant, Lounge, Italian";

if(isset($_SESSION["loggedin"]))
{
    header("Location: logged.php");
}

include 'backend_header.php';
?>

<div id="content">
    <!--==============================row_9=================================-->   
    <div class="row_9"> 
        <div class="container">
             
             
                <div id="loginform" class="col-lg-12 col-md-12 col-sm-12 address">
                    <h2 id="login" class="padbot3">Login</h2>
                    <form id="contact-form" class="contact-form" action="login_process.php" method="post">
                      <div class="row">
                        
                        <div class="col-lg-6">
                          <label class="name">
                               <!--[if lt IE 10]>
                                        <h3 class="red">Username</h3>
                                    <![endif]-->
                              <input id="loginName" name="username" type="text" placeholder="Username*:" required />
                            <span class="empty-message">*This field is required.</span>
                            <span class="error-message">*This is not a valid name.</span>
                            <br/>
                          </label>
                      </div>
                          <div class="col-lg-6">
                          <label class="password">
                               <!--[if lt IE 10]>
                                        <h3 class="red">Password</h3>
                                    <![endif]-->
                              <input id="loginPass"name="password" type="password" placeholder="Password*:" required/>
                            <span class="empty-message">*This field is required.</span>
                            <span class="error-message">*This is not a valid email.</span>
                            <br/>
                          </label>
                      </div>
                      </div>
                       
                    
                        <!--<a href="#" data-type="submit" class="btn btn-primary btn1">Login</a>-->
                        <!--<input class="btn btn-default" id="submit" type="submit" value="Login"/>-->
                        <button class="btn btn-primary" id="submit" type="submit" value="submit">Login</button>
                    
                     
                    </form>
                    
                    <span id="message"><?php
                  
                                if(isset($_SESSION["errors"]))
                                {                
                                   echo $_SESSION["errors"];
                                }
                                    unset($_SESSION["success"]);
                                    unset($_SESSION["errors"]);
                    ?></span>
                </div>
             </div> 
        </div>
    </div>  


         
         <?php
         include 'footer.php';
         ?>
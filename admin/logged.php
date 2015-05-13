<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
  //error_reporting(0);
    
    $_SESSION["current_page"] = "review";
    
     $title = "Review Booking |Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "Review, Sliema, Pitch, Food, Restaurant, Lounge, Italian";
if(!isset($_SESSION["loggedin"]))
{
    header("Location: login.php");
}

include 'backend_header.php';
$res = new reservation();

//echo $res->getSQL(NULL, NULL, "oldest", NULL, NULL);

?>

<div class="row_4">  
        <div class="container">
            <div class="row">
                
                <div class="row">
                    <div class="col-lg-10 col-sm-8 col-xs-12">
                        <h2 id="reservations">Reservations</h2>
                    </div>
                    <div class="col-lg-2 col-sm-4 " >
                        <select id="orderby" name="orderby" style="margin-top: 30px;" form="contact-form">
                               <option disabled="" selected="" style="display:none;">Order By:</option>
                               <option selected="selected">Latest</option>
                               <option>Oldest</option>        
                           </select>
                    </div>
                    
                </div>
                 
                <div id="showreservations">              
                 <?php
                 $res->checkIfExpired();
                 
                  $status="";
                    if(isset($_GET["status"]) && !empty($_GET["status"]))
                    {
                        $status = $_GET["status"];
                    }
                    
                    if ($status == "pending")
                    {
                         $sql = $res->getSQL(NULL, NULL, "latest", "status", "pending");
                    }
                    else
                    {
                         $sql = $res->getSQL(NULL, NULL, "latest", NULL, NULL);
                    }
                
                
                 $res->getReservations($sql);
                 
                 ?>
                </div> 
                <div class="row">
                    <div id="form">
                        <form id="contact-form" class="contact-form" action="../process_data/load_booking.php" method="post">
                         <div class="col-lg-12 ">
                             <p>Filter Reservations:</p>
                         </div>
                         <div class="col-lg-3 col-sm-6">
                             <input name="startdate" type="datetime" id="date_timepicker_start" placeholder="Start Date" />
                         </div>
                         <div class="col-lg-3 col-sm-6">
                            <input name="enddate" type="datetime" id="date_timepicker_end" placeholder="End Date" />
                        </div>
                         
                        <div class="col-lg-3 col-sm-6">
                            
                             <select id="filter" name="filter">
                               <option disabled="" selected="" style="display:none;">Filters:</option>
                               <option>Status</option>
                               <option>Period</option>
                               <option>No. of Diners</option>
                               <option>Side</option>
                               <option>No Filter</option>
                           </select>
                         </div>
                         <div class="col-lg-3 col-sm-6">
                            <select id="options" name="option">
                               <option id="option_options" disabled="" selected="" style="display:none;">Options:</option>
                               <option class="status">Pending</option>
                               <option class="status">Confirmed</option>
                               <option class="status">Rejected</option>
                               <option class="status">Expired</option>
                               <option class="status">Cancelled</option>
                               
                               <option class="period">Lunch</option>
                               <option class="period">Dinner</option>
                               
                               <option class="side">Prime Side</option>
                               <option class="side">Sea Side</option>
                               <option class="side">Bar Side</option>
                               <option class="side">Inside</option>
                               <option class="side">Gallery</option>
                               <option class="side">No Preference</option>
                               
                               <option class="no_of_diners">1</option>
                               <option class="no_of_diners">2</option>
                               <option class="no_of_diners">3</option>
                               <option class="no_of_diners">4</option>
                               <option class="no_of_diners">5+</option>
                                         
                           </select>
                        </div>
                        <button class="btn btn-primary" id="submit" type="submit" style="display: none" value="Book Table">Book Table</button>
                     </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
                    
                           
                   
            
         
         <?php
         include 'footer.php';
         ?>
<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    
    $_SESSION["current_page"] = "admin";
    
     $title = "Booking Confirmation |Sliema Pitch Restaurant & Lounge";
$desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate sit amet lectus eu scelerisque. Donec ullamcorper mi diam, vitae hendrerit metus aliquet nec. Fusce id vestibulum augue. Praesent elit orci, blandit eu placerat ut, egestas sit amet nibh. Aenean placerat sit amet nunc nec venenatis. Duis id orci rhoncus, congue nunc sit amet, porttitor magna. Etiam in convallis lorem. Quisque euismod dictum ante. Pellentesque tellus est, iaculis quis tellus at, dictum faucibus libero. Duis tincidunt diam quis turpis posuere malesuada. Nunc eu nisi a felis ultrices condimentum. Mauris quis nisl ornare turpis sollicitudin condimentum. Etiam at mauris tempor, scelerisque turpis at, vulputate nisi. Suspendisse hendrerit tincidunt ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur placerat consectetur. Cras vitae mauris tellus. Duis leo eros, eleifend sit amet magna quis, hendrerit malesuada purus. Proin rhoncus consequat augue et mollis. Nunc pretium porta nibh, in volutpat nunc bibendum ut. Nullam neque dolor, facilisis nec dignissim vitae, adipiscing nec turpis. Duis viverra facilisis risus id scelerisque. Aenean iaculis leo at elit gravida, eu tempor sem faucibus.
Sed viverra feugiat quam in suscipit. Vestibulum nec massa luctus risus tincidunt tristique eget vel augue. Aenean eu libero sed sem varius hendrerit. Proin eu erat tempus, rutrum eros eget, convallis turpis. Nam id tempor lorem. Suspendisse ultricies imperdiet libero, quis pellentesque elit iaculis id. Maecenas porta a lorem sed porta.
Suspendisse porttitor eleifend ornare. Nam enim dolor, tempor a tortor quis, sodales pulvinar est. Integer gravida lacinia accumsan. Maecenas quis magna id eros interdum sollicitudin. Proin eget consequat ipsum, sit amet luctus nulla. Quisque et porta nunc. Suspendisse eget justo ac lacus porttitor condimentum. Nunc vel quam tincidunt, euismod mi non, pretium libero. Integer facilisis neque volutpat, euismod leo ut, condimentum nibh.
Sed malesuada vitae neque eu viverra. Praesent turpis felis, vehicula a ipsum eu, lacinia tincidunt ante.";
$keywords = "Confirm, Sliema, Pitch, Food, Restaurant, Lounge, Italian";
    
if(!isset($_SESSION["loggedin"]))
{
    header("Location: login.php");
    
   
}

include 'backend_header.php';


?>

<div class="row_4">  
   <div class="container">
       <h2 id="booking_confirmation">Booking Confirmation</h2>
               <?php
                 
                 include_once '../data_class/db_connection.php';
                    $db = new db_connection();

                    if ($_SERVER["REQUEST_METHOD"] == "GET")
                    {

                        if(isset($_GET["id"]) && !empty($_GET["id"]))
                        {
                            $booking_id = $db->filter($_GET["id"]);
                        
                       
                      
                        
                        $link = $db->openConnection();
        
                        $sql = "SELECT * FROM bookings INNER JOIN booking_status ON (bookings.status_id=booking_status.status_id) WHERE booking_id=$booking_id";
                
  
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
                    

                            while($row = mysqli_fetch_array($result))
                              {
                                
                                $res = new reservation();
                                $res->reservation_id = $row['booking_id'];
                                $res->name = $row['name'];
                                $res->datetime = $row['date'];
                                $res->date_added = $row['date_added'];
                                $res->date_modified = $row['date_modified'];
                                $res->email = $row['email'];
                                $res->status = $row['status'];
                                $res->phone = $row['number'];
                                $res->no_of_people = $row['no_of_people'];
                                $res->comment = $row['comment'];
                                $res->side = $row['side'];
                                ?>
       
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                         <span>Name: </span> <h3 class="red"><?php echo $res->name; ?></h3> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <p><span class="booking-label">Date: </span><?php echo $res->getDate(); ?></p> 
                                    </div>
                                     <div class="col-lg-3 col-md-3 col-sm-3">
                                        <p><span class="booking-label">Period: </span><?php echo $res->getPeriod(). " at ".$res->getTime() ; ?></p> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <p><span class="booking-label">No. of Diners: </span><?php echo $res->no_of_people; ?></p> 
                                    </div>
                                </div>
       
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <p> <span class="booking-label">Email: </span><?php echo $res->email ?></p> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                         <p> <span class="booking-label">Contact Number: </span><?php echo $res->phone ?></p> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                         <p> <span class="booking-label">Preferred Area: </span><?php echo $res->area ?></p> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <p> <span class="booking-label">Booking Status: </span><?php echo $res->getStatus(); ?></p> 
                                    </div>
                                </div>
       
                                 <hr class="hidden-xs">
                                 
                                  <div class="row">
                                    <div class="col-sm-2">
                                        <p> <span class="booking-label">Booking ID: </span><?php echo $res->reservation_id ?></p> 
                                    </div>
                                    <div class="col-sm-5">
                                        <p> <span class="booking-label">Booking made on: </span><?php echo $res->getDateAdded() ?></p> 
                                    </div>
                                    <div class="col-sm-5">
                                        <p> <span class="booking-label">Booking modified: </span><?php echo $res->getDateModified() ?></p> 
                                    </div>
                                   
                                </div>
                                 
                                  <hr class="hidden-xs">
                                 
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <p> <span class="booking-label">Special Requests/Comments: </span><?php echo $row['comment']; ?></p> 
                                    </div>
                                    <div class="col-sm-12">
                                        
                                        <form id="booking_confirmation_form" class="contact-form" action="../process_data/confirm_booking.php" method="post">
                                           <input type="checkbox" id="cb1" name="default" value="default" checked> 
                                             <label for="cb1">Send default reply</label>
                                            
                                            
                                            <textarea class="animated" name="reply" placeholder="Enter your reply:"></textarea>
                                            <!---Buttons---->
                                            <div class="row">
                                  
                                                <div class="col-sm-4" id="test1">
                                                    <!--<a href="process_data/confirm_booking.php?option=approve&id=<?php //echo $row['booking_id']; ?>" data-type="submit" class="btn btn-primary btn1" style="width: 100%">
                                                        Approve
                                                    </a> -->  
                                                    <button class="btn btn-primary" id="approve" type="submit" name="approve_btn" value="approve">APPROVE    </button>

                                                </div>
                                                 <div class="col-sm-4" id="test1">
                                                    <!--<a href="process_data/confirm_booking.php?option=approve&id=<?php //echo $row['booking_id']; ?>" data-type="submit" class="btn btn-primary btn1" style="width: 100%">
                                                        Approve
                                                    </a> -->  
                                                    <button class="btn btn-primary" id="cancel" type="submit" name="cancel_btn" value="cancel">CANCEL</button>

                                                </div>

                                                 <div class="col-sm-4" id="test2">
                                                <!--<a href="process_data/confirm_booking.php?option=reject&id=<?php echo $row['booking_id']; ?>" data-type="submit" class="btn btn-primary btn1" style="width: 100%">
                                                        Reject
                                                    </a>-->
                                                     <button class="btn btn-primary" id="reject" type="submit" name="reject_btn" value="reject">REJECT</button>

                                                 </div>
                                        
                                   
                                   
                                                </div>
                                           <input type="hidden" value="<?php echo $res->reservation_id ?>" name="booking_id"/>
                                            <!---End Buttons---->
                                        </form>
                                        
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                                
                                
                                    
                               <?php

                              }
                         $db->closeConnection();
                         }
                        else
                        {
                            echo "No booking selected <a href='index.php'>Back</a>";
                        }
        
                    }
        
        
                    ?>
                         
                
                
                
   </div>
</div>

<?php include "footer.php"; ?>
          
                           
                   
            
         
        
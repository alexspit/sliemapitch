<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
unset($_SESSION["success"]);
unset($_SESSION["errors"]);

include_once '../data_class/db_connection.php';
include_once '../data_class/reservation.php';
$db = new db_connection();
$res = new reservation();


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //$reservation = array();
    
    if(isset($_POST["name"]) && !empty($_POST["name"]))
    {
        $name = $db->filter($_POST["name"]);
    }
    else
    {
      $_SESSION["errors"] .= "Name is empty</br>"; 
    }
    if(isset($_POST["datetime"]) && !empty($_POST["datetime"]))
    {
        $datetime = $db->filter($_POST["datetime"]);
        $res->datetime = $datetime;
        $period = $res->getPeriod();
        
    }
    else
    {
      $_SESSION["errors"] .= "Date is empty</br>"; 
    }
    if(isset($_POST["number"]) && !empty($_POST["number"]))
    {
        $no_of_people = $db->filter($_POST["number"]);
    }
    else
    {
      $_SESSION["errors"] .= "Contact Number is empty</br>"; 
    }
    
    if(isset($_POST["email"]) && !empty($_POST["email"]))
    {
        $email = $db->filter($_POST["email"]);
    }
    else
    {
      $_SESSION["errors"] .= "Email is empty</br>"; 
    }
    
    if(isset($_POST["phone"]) && !empty($_POST["phone"]))
    {
        $phone = $db->filter($_POST["phone"]);
    }
    else
    {
      $_SESSION["errors"] .= "Phone is empty</br>"; 
    }
    
    if(isset($_POST["area"]) && !empty($_POST["area"]))
    {
        $area = $db->filter($_POST["area"]);
    }
    else
    {
      $area = "";
    }
    if(isset($_POST["comment"]) && !empty($_POST["comment"]))
    {
    $comment = $db->filter($_POST["comment"]);
    }
    else
    {
      $comment = "";
    }
    
    
    date_default_timezone_set('Europe/Berlin');
    $date_added = date('Y/m/d H:i:s', time());
    //$date_added = DateTime::();
    
    
    if(isset($_SESSION["errors"]))
    {
        header("Location: ../reservations.php#message");
    }
    else
    {
        $link = $db->openConnection();
        
        $sql = "INSERT INTO bookings (name, date, number, no_of_people, email, side, comment, date_added, status_id, period)"
                . " VALUES"
                . " ('$name','$datetime','$phone','$no_of_people','$email','$area','$comment','$date_added','3', '$period')";
  
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
        $booking_id = mysqli_insert_id($link);
        $_SESSION["success"] = ($result > 0 ? true : false); 

        $db->closeConnection();
        
        
          //----------------------------------Notification to customer-----------------------//   
        $booking_email = "reservations@sliemapitch.com";
        $subject = "Sliema Pitch Booking - Pending";
        
         $tmp_date = strtotime($datetime);
         $date = date( 'l jS F, Y', $tmp_date );
         $time = date( 'H:s', $tmp_date );
             
        ob_start();
        include '../email/booking_notification_email.php';
        $message = ob_get_clean();
        ob_end_flush();
       
        $header = "From: " . $booking_email . "\r\n";
        $header .= "Reply-To: ". $booking_email . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       
       // echo $message;
        //exit;
         if(mail($email, $subject, $message,$header))
            {
                $_SESSION["customer_booking_notification_email_sent"] = true;
            }
            else
            {
                 $_SESSION["customer_booking_notification_email_sent"] = false;
            }
            
         //----------------------------------Notification to admin-----------------------//   
           $url = "http://www.sliemapitch.com/booking_confirmation.php?id=".$booking_id."#booking_confirmation";
           
           $subject2 = "New Booking";
           $body2 = "Name: $name";
           $body2 .= "</br>Email: $email";
           $body2 .= "</br>Phone: $phone";
           $body2.= "</br>Date: $date";
           $body2 .= "</br>Time: $time";
           $body2 .= "</br>No. of Diners: $no_of_people";
           $body2 .= "</br>Area: $area";
           $body2 .= "</br></br>Comment: $comment";
           $body2 .= "</br></br>Booking Made: $date_added";
           $body2 .= "</br></br><a href='$url'>Go to booking page</a>";
          
        
           $header2 = "From: " . $booking_email . "\r\n";
           $header2 .= "Reply-To: ". $email . "\r\n";
           $header2 .= "MIME-Version: 1.0\r\n";
           $header2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if(mail($booking_email, $subject2, $body2,$header2))
        {
             $_SESSION["admin_booking_notification_email_sent"] = true;
        }
        else
        {
              $_SESSION["admin_booking_notification_email_sent"] = false;
        }   
         echo $body2;
         exit;
        header("Location: ../reservations.php#message");
    }
    
     
    
  
    }
    
    
    

    
?>
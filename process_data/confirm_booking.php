<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])) {
    header("Location: ../admin/login.php");
}
unset($_SESSION["modify_booking"]);
unset($_SESSION["email_sent"]);

include_once '../data_class/db_connection.php';
include_once '../data_class/reservation.php';
$db = new db_connection();
$res = new reservation();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Get RESERVATION ID
    if(isset($_POST["booking_id"]) && !empty($_POST["booking_id"]))
    {
        $booking_id = $db->filter($_POST["booking_id"]);
    }
    else
    {
        header("Location: ../admin/logged.php");
    }
    
    //Get which button was pressed
    if(isset($_POST['approve_btn'])){
        $option = 1;
    }
    
    else if (isset($_POST['reject_btn'])) {
        $option = 2;
    } 
    else if (isset($_POST['cancel_btn'])) {
        $option = 4;
    } 
    else {
    //no button pressed
        header("Location: ../admin/logged.php"); 
    }
    
    //Getting admin comment
    if(isset($_POST["default"]))
    {
        $manager_message = "";
    }
    else
    {
        $manager_message = $db->filter($_POST["reply"]);
    }
    
    
    
  /*  if(isset($_GET["option"]) && !empty($_GET["option"]))
    {
        $option = $db->filter($_GET["option"]); 
    }
    else
    {
        header("Location: ../logged.php"); 
    }
    
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
        $booking_id = $db->filter($_GET["id"]);
    }
    else
    {
        header("Location: ../logged.php");
    }
    
   /* if(isset($_GET["email"]) && !empty($_GET["email"]))
    {
        $email = $db->filter($_GET["email"]);
    }
    else
    {
        header("Location: ../logged.php");
    }*/
   /*
    if($option == "approve")
    {
        $option = 1;
    }
    else if($option == "reject")
    {
        $option = 2;
    }
    else
    {
        header("Location: ../logged.php");
        
    }
    
    */
    
    
    
    date_default_timezone_set('Europe/Berlin');
    $date_modified = date('Y/m/d H:i:s', time());
    //$date_added = DateTime::();
    
    
    if(isset($booking_id) && isset($option))
    {
        $link = $db->openConnection();
        
         $sql = ' UPDATE bookings SET status_id="'.$option.'", date_modified="'.$date_modified.'" WHERE booking_id="'.$booking_id.'"';
       
  
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
       // $this->productID = mysqli_insert_id($link);
        $_SESSION["modify_booking"] = ($result > 0 ? true : false); 
        if($option <=2){
        if($_SESSION["modify_booking"])
        {
            $sql = "SELECT * FROM bookings WHERE booking_id=$booking_id";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));    
                    
            while($row = mysqli_fetch_array($result))
              {     
                    $email = $row["email"];
                    $name = $row["name"];
                    $tmp_date = strtotime( $row["date"] );
                    $date = date( 'l jS F, Y', $tmp_date );
                    $time = date( 'H:s', $tmp_date );
                    $no_of_people = $row['no_of_people'];
                    $area = $row['side'];
                    $comment = $row['comment'];
                    $tmp_date_added = strtotime($row['date_added']);
                    $date_added = date( 'jS \of F', $tmp_date_added );
                    
                   
                    
                if($option == 1)
                {
                   $subject = "Sliema Pitch Booking Confirmation";
                
                   ob_start();
                   include '../email/booking_confirmation_email.php';
                   $message = ob_get_clean();
                   ob_end_flush();

                }
                else if($option == 2)
                {
                    $res->date_added = $row['date_added'];
                    
                    $subject = "Sliema Pitch Booking Rejected";
                    $message = "Dear ".$row['name'].",<br/><br/> We are very sorry to inform you that your booking placed on ".$res->getDateAdded()." at ".$res->getTimeAdded() ." was rejected due to the following reason:</br>$manager_message.</br></br>Kind Regards,</br></br>The Management";
                }
              
              }
            
            }
        
            //$header = "Content-type: text/html\n";
            //$header .= "From: \"reservations@sliemapitch.com\"<noreply@sliemapitch>\n";
            $booking_email = "reservations@sliemapitch.com";

            $header = "From: " . $booking_email . "\r\n";
            $header .= "Reply-To: ". $booking_email . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

          
            if(mail($email, $subject, $message,$header))
            {
                $_SESSION["email_sent"] = true;
            }
            else
            {
                 $_SESSION["email_sent"] = false;
            }

            echo $message;
            exit;
        }
        $db->closeConnection();
        header("Location: ../admin/logged.php#reservations");
    }
    else{
    
        header("Location: ../admin/booking_confirmation.php");
    }

}
else{
        header("Location: ../index.php");
}
?>
<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
unset($_SESSION["customer_message_notification_email_sent"]);
unset($_SESSION["errors"]);

include_once '../data_class/db_connection.php';
$db = new db_connection();

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
    
    if(isset($_POST["comment"]) && !empty($_POST["comment"]))
    {
       $comment = $db->filter($_POST["comment"]);
    }
    else
    {
      $_SESSION["errors"] .= "Comment is empty</br>"; 
    }
    
    
    if(isset($_SESSION["errors"]))
    {
        header("Location: ../contact.php#getintouch");
    }
    else{
    
         $subject = "New Message from $name";
                    $body = "Name: $name";
                    $body .= "</br>Email: $email";
                    $body .= "</br>Phone: $phone";
                    $body .= "</br></br>Comment: $comment";
        
     $header = "Content-type: text/html\n";
     $header .= "From: $email\n";


if(mail("info@sliemapitch.com", $subject, $body,$header))
{
     $_SESSION["customer_message_notification_email_sent"] = true;
}
else
{
      $_SESSION["customer_message_notification_email_sent"] = false;
}

       
       header("Location: ../contact.php#getintouch");
    }
    
     
    
  
    }
    
    
    

    
?>
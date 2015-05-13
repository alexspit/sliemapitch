<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    

include_once '../data_class/db_connection.php';
$db = new db_connection();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //$reservation = array();
    $errors="";
    
    if(isset($_POST["name"]) && !empty($_POST["name"]))
    {
        $name = $db->filter($_POST["name"]);
    }
    else
    {
      $errors .= "Name is empty</br>"; 
    }
    
    if(isset($_POST["email"]) && !empty($_POST["email"]))
    {
        $email = $db->filter($_POST["email"]);
    }
    else
    {
      $errors .= "Email is empty</br>"; 
    }
    
    if(isset($_POST["phone"]) && !empty($_POST["phone"]))
    {
        $phone = $db->filter($_POST["phone"]);
    }
    else
    {
      $errors .= "Phone is empty</br>"; 
    }
    
    if(isset($_POST["comment"]) && !empty($_POST["comment"]))
    {
       $comment = $db->filter($_POST["comment"]);
    }
    else
    {
      $errors .= "Comment is empty</br>"; 
    }
    
    
    if(isset($errors) && !empty($errors))
    {
        echo $errors;
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
    echo "Contact form submitted successfully. We will get back to you as soon as possible through email.";
}
else
{
     echo "There was an error while submitting the contact form, please try again later.";
}

       
       
    }
    
     
    
  
    }
    
    
    

    
?>
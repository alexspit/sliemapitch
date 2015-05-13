<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
unset($_SESSION["success"]);
unset($_SESSION["errors"]);

include_once '../data_class/db_connection.php';
include_once '../data_class/reservation.php';

$db = new db_connection();
$res = new reservation();

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    //$reservation = array();
    
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
        $res->reservation_id = $db->filter($_GET["id"]);
    }
    else
    {
      $_SESSION["errors"] .= "Error while deleting booking: 'Invalid booking ID'</br>"; 
    }
     
    if(isset($_SESSION["errors"]))
    {
        header("Location: ../admin/logged.php");
    }
    else
    {
       $_SESSION["success"] = $res->deleteBooking($res->reservation_id);
       
       header("Location: ../admin/logged.php");
           
    }
    
     
    
  
}
    
    
    

    
?>
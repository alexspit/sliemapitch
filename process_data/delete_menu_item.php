<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
unset($_SESSION["success"]);
unset($_SESSION["errors"]);

include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';

$db = new db_connection();
$menu = new menu_item();

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    //$reservation = array();
    
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
        $success = $menu->deleteMenuItem($db->filter($_GET["id"]));
    }
    else
    {
      $_SESSION["errors"] .= "Error while deleting booking: 'Invalid booking ID'</br>"; 
    }
     
    if(isset($_SESSION["errors"]))
    {
        header("Location: ../admin/logged.php");
    }
    else if($success)
    {
      $_SESSION["success"] = true;
      header("Location: ../admin/manage_menu.php");    
    }
    else
    {
      $_SESSION["success"] = flase;
      header("Location: ../admin/manage_menu.php");
    }
    
     
    
  
}
    
    
    

    
?>
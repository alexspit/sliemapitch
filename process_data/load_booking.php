<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
//unset($_SESSION["success"]);
//unset($_SESSION["errors"]);

include_once '../data_class/db_connection.php';
include_once '../data_class/reservation.php';
$db = new db_connection();
$res = new reservation();


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    
    if(isset($_POST["order"]) && !empty($_POST["order"]))
    {
        $orderby = $db->filter($_POST["order"]);
    }
    else
    {
       $orderby = "latest";
    }
    
    if(isset($_POST["startdate"]) && !empty($_POST["startdate"]))
    {
        $startdate = $db->filter($_POST["startdate"]);
    }
    else
    {
       $startdate = NULL;
    }
    
    if(isset($_POST["enddate"]) && !empty($_POST["enddate"]))
    {
        $enddate = $db->filter($_POST["enddate"]);
    }
    else
    {
       $enddate = NULL;
    }
    
    if(isset($_POST["filter"]) && !empty($_POST["filter"]))
    {
        $filter = $db->filter($_POST["filter"]);
    }
    else
    {
       $filter = NULL;
    }
    
    if(isset($_POST["option"]) && !empty($_POST["option"]))
    {
        $option = $db->filter($_POST["option"]);
    }
    else
    {
       $option = NULL;
    }
     
    if (strtolower($filter) == "no. of diners") 
    {
        $option = (int)$option;
    }

     $sql = $res->getSQL($startdate, $enddate, $orderby, $filter, $option);
    
    $res->getReservations($sql);
    
  
    }
    
    
    

    
?>
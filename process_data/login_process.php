<?php

if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
unset($_SESSION["loggedin"]);
unset($_SESSION["errors"]);

define("USERNAME", "admin");
define("PASSWORD", "123");

include_once '../data_class/db_connection.php';
$db = new db_connection();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    
    
    if(isset($_POST["username"]) && !empty($_POST["username"]))
    {
        $username = $db->filter($_POST["username"]);
    }
    else
    {
      $_SESSION["errors"] .= "Username is empty</br>"; 
    }
    
    if(isset($_POST["password"]) && !empty($_POST["password"]))
    {
        $password = $db->filter($_POST["password"]);
    }
    else
    {
      $_SESSION["errors"] .= "Password is empty</br>"; 
    }
    
    if(USERNAME == $username && PASSWORD == $password)
    {
        $_SESSION["loggedin"] = true;
    }
    if(USERNAME != $username)
    {
        $_SESSION["errors"] .= "Incorrect Username</br>";
    }
    if(PASSWORD != $password)
    {
        $_SESSION["errors"] .= "Incorrect Password</br>";
    }
   
    
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] = true)
    {
        
      header("Location: ../logged.php");
      
    }
    else{
       
       header("Location: ../login.php#login");
    }
}
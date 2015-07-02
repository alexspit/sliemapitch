<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
    
include_once '../data_class/db_connection.php';
include_once '../data_class/menu_category.php';

$db = new db_connection();
$category = new menu_category();

$response = array('success' => false, 'error' => "");


if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    if($category->reorder($_POST["reordered_list"]))
    {
        $respone['success'] = true;
    }
}
else
{
     $response['error'] = "Denied Access";
}
header('Content-Type: application/json');
echo json_encode($response);
   


    
?>
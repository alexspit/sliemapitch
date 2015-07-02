<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}

include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';

$db = new db_connection();
$menu = new menu_item();
$response = array('success' => false, 'errors' => array(), 'id' => "");
$id;

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
   
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
        $id = $db->filter($_GET["id"]);
       // $success = $menu->deleteMenuItem($db->filter($_GET["id"]));
    }
    else
    {
      array_push($response['errors'], array("error" => "id", "message" => "Menu Item ID missing'"));
    }
     
    if(count($response['errors']) == 0){    
        if($menu->deleteMenuItem($id)){
            $response['success'] = true; 
            $response['id'] = $id;
        }
        else{
             array_push($response['errors'], array("error" => "delete", "message" => "Error while deleting booking"));
        }
    }
    else 
    {
        array_push($response['errors'], array("error" => "delete", "message" => "Errors present, contact system admin"));
    } 
}else{
     array_push($response['errors'], array("error" => "request", "message" => "Access Denied'"));
}
    
header('Content-Type: application/json');
echo json_encode($response);
    

    
?>
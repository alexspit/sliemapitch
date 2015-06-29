<?php
/*if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
unset($_SESSION["success"]);
unset($_SESSION["errors"]);

include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';
include_once '../data_class/menu_category.php';


$db = new db_connection();
$menuitem = new menu_item();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   
    if(isset($_POST["menuitem_category"]) && !empty($_POST["menuitem_category"]))
    {
        $menuitem->category = new menu_category($db->filter($_POST["menuitem_category"]));
    }
    else
    {
      $_SESSION["errors"] .= "Category not selected</br>"; 
    }
   
   
  
    
    if(isset($_POST["menuitem_name"]) && !empty($_POST["menuitem_name"]))
    {
        $menuitem->name = $db->filter($_POST["menuitem_name"]);
    }
    else
    {
      $_SESSION["errors"] .= "Name is empty</br>"; 
    }
    
     
    if(isset($_POST["menuitem_price"]) && !empty($_POST["menuitem_price"]))
    {
        $menuitem->price = (float) $db->filter($_POST["menuitem_price"]);
    }
    else
    {
      $_SESSION["errors"] .= "Price is empty</br>"; 
    }
     
    if(isset($_POST["menuitem_description"]) && !empty($_POST["menuitem_description"]))
    {
        $menuitem->description = $db->filter($_POST["menuitem_description"]);
    }
    else
    {
      $_SESSION["errors"] .= "Price is empty</br>"; 
    }
 
    $menuitem->vegetarian = isset($_POST['vegetarian']) && $_POST['vegetarian'] ? 1 : 0;
    $menuitem->spicy = isset($_POST['spicy']) && $_POST['spicy'] ? 1 : 0;
    $menuitem->gluten_free = isset($_POST['gluten_free']) && $_POST['gluten_free'] ? 1 : 0;
    $menuitem->featured = isset($_POST['featured']) && $_POST['featured'] ? 1 : 0;
    
   
    if(isset($_SESSION["errors"]))
    {
        header("Location: ../admin/manage_menu.php");
    }
    else
    {
       
       $menuitem->item_id = $menuitem->addMenuItem();
       
       if ($menuitem->item_id){
           header('Location: ../admin/manage_menu.php');
       }
        
       
    }
    
     
    
  
}
  */


if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';
include_once '../data_class/menu_category.php';

$db = new db_connection();
$menuitem = new menu_item();

$response = array('success' => false, 'message' => array(), 'data' => null);


if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    if(isset($_POST["menuitem_category"]) && !empty($_POST["menuitem_category"]))
    {    
        /*$menuitem->category = new menu_category($db->filter($_POST["menuitem_category"]));
        if(!isset($menuitem->category)){
            array_push($response['message'], array("category" => "Error adding category"));
        }*/      
        try{
            $menuitem->category = new menu_category($db->filter($_POST["menuitem_category"]));
        }catch(Exception $e){
            array_push($response['message'], array("category" => $e->getMessage()));
        }
    }
    else
    {
      array_push($response['message'], array("category" => "Category not selected"));
      //$response['message'] = array("category" => "Category not selected");
    }
    
    if(isset($_POST["menuitem_name"]) && !empty($_POST["menuitem_name"]))
    {
        $menuitem->name = $db->filter($_POST["menuitem_name"]);
    }
    else
    {
      //$_SESSION["errors"] .= "Name is empty</br>"; 
      array_push($response['message'], array("name" => "Name is empty"));
    }
    
    if(isset($_POST["menuitem_price"]) && !empty($_POST["menuitem_price"]))
    {
        try{
            $menuitem->price = (float) $db->filter($_POST["menuitem_price"]);
        }catch(Exception $e){
            array_push($response['message'], array("price" => $e->getMessage()));
        }
    }
    else
    {
      array_push($response['message'], array("price" => "Price is empty")); 
    }
     
    if(isset($_POST["menuitem_description"]) && !empty($_POST["menuitem_description"]))
    {
        $menuitem->description = $db->filter($_POST["menuitem_description"]);
    }
    else
    {
       array_push($response['message'], array("description" => $e->getMessage())); 
    }
    
    $menuitem->vegetarian = isset($_POST['vegetarian']) && $_POST['vegetarian'] ? 1 : 0;
    $menuitem->spicy = isset($_POST['spicy']) && $_POST['spicy'] ? 1 : 0;
    $menuitem->gluten_free = isset($_POST['gluten_free']) && $_POST['gluten_free'] ? 1 : 0;
    $menuitem->featured = isset($_POST['featured']) && $_POST['featured'] ? 1 : 0;
    
    $menuitem->item_id = $menuitem->addMenuItem();
       
    if ($menuitem->item_id){
           $response['success'] = true;
           $response['data'] = $menuitem;    
    }
    else{
        array_push($response['message'], array("add" => "Error adding menu item into database")); 
    }
}
else
{
     $response['message'] = "Access Denied";
}

header('Content-Type: application/json');
echo json_encode($response);
 
?>
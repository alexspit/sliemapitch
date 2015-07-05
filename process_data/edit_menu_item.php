<?php
   
include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';
include_once '../data_class/menu_category.php';

$db = new db_connection();
$menuitem = new menu_item();

$response = array('success' => false, 'errors' => array(), 'items' => null);


if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    if(isset($_POST["menuitem_category"]) && !empty($_POST["menuitem_category"]))
    {         
        try{
            $menuitem->category = new menu_category($db->filter($_POST["menuitem_category"]));
        }catch(Exception $e){
            array_push($response['errors'], array("error" => "category",  "message" => $e->getMessage()));
        }
    }
    else
    {
      array_push($response['errors'], array("error" => "category", "message" => "Category not selected"));
      //$response['message'] = array("category" => "Category not selected");
    }
    
    if(isset($_POST["menuitem_id"]) && !empty($_POST["menuitem_id"]))
    {         
        try{
            $menuitem->item_id = $db->filter($_POST["menuitem_id"]);
        }catch(Exception $e){
            array_push($response['errors'], array("error" => "id",  "message" => $e->getMessage()));
        }
    }
    else
    {
      array_push($response['errors'], array("error" => "category", "message" => "Category not selected"));
      //$response['message'] = array("category" => "Category not selected");
    }
    
    if(isset($_POST["menuitem_name"]) && !empty($_POST["menuitem_name"]))
    {
        $menuitem->name = $db->filter($_POST["menuitem_name"]);
    }
    else
    {
      //$_SESSION["errors"] .= "Name is empty</br>"; 
      array_push($response['errors'], array("error" => "name", "message" => "Name is empty"));
    }
    
    if(isset($_POST["menuitem_price"]) && !empty($_POST["menuitem_price"]))
    {
        try{
            $menuitem->price = (float) $db->filter($_POST["menuitem_price"]);
        }catch(Exception $e){
            array_push($response['errors'], array("error" => "price", "message" =>  $e->getMessage()));
        }
    }
    else
    {
      array_push($response['errors'], array("error" => "price", "message" =>  "Price is empty")); 
    }
     
    if(isset($_POST["menuitem_description"]) && !empty($_POST["menuitem_description"]))
    {
        $menuitem->description = $db->filter($_POST["menuitem_description"]);
    }
    else
    {
       array_push($response['errors'], array("error" => "description", "message" => "Description is empty")); 
    }
    
    $menuitem->vegetarian = isset($_POST['vegetarian']) && $_POST['vegetarian'] ? 1 : 0;
    $menuitem->spicy = isset($_POST['spicy']) && $_POST['spicy'] ? 1 : 0;
    $menuitem->gluten_free = isset($_POST['gluten_free']) && $_POST['gluten_free'] ? 1 : 0;
    $menuitem->featured = isset($_POST['featured']) && $_POST['featured'] ? 1 : 0;
    
    if(count($response['errors']) == 0){    
        if($menuitem->updateMenuItem()){
             $response['success'] = true;
             $response['items'] = $menuitem->getMenuItems();
        }
  
    }
    
    
}
else
{
     array_push($response['errors'], array("error" => "request", "message" => "Access Denied"));
}

header('Content-Type: application/json');
echo json_encode($response);
 
?>
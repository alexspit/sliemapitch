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

$response = array('success' => false, 'errors' => array(), 'menuitem' => null);


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
            array_push($response['errors'], array("error" => "category",  "message" => $e->getMessage()));
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
        $menuitem->item_id = $menuitem->addMenuItem();
       
        if ($menuitem->item_id){
               $response['success'] = true;
               $response['menuitem'] = $menuitem;
               
               $response['menuitem_string'] .= '<div class="menu_item" >
                    <div class="row">
                            <form action="../process_data/edit_menu_item.php?id='.$menuitem->item_id.'" method="post" id="form_'.$menuitem->item_id.'" class="menuitem_form">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <h3 class="red menu_item-margin">'.$menuitem->name.'</h3> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                        <p class=" menu_item-margin">&#8364;'.$menuitem->price.'</p> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                        <p class=" menu_item-margin">'.ucfirst($menuitem->category->category_name).'</p> 
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-6">
                                        <a data-type="submit" class="btn btn-primary btn1">                                        
                                            <span class="glyphicon glyphicon-edit"></span> 
                                        </a>  
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-6">
                                        <a href="../process_data/delete_menu_item.php?id='.$menuitem->item_id.'" class="btn btn-primary btn1">
                                           <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>   
                             </form>
                     </div>
                     <div class="row">
                                    <hr class="hidden-xs">
                                    <div class="hidden-xs col-sm-offset-8 col-sm-4"> 
                                         <p class="menu_item-details">Added on '.$menuitem->date_added.'</p> 
                                    </div>          
                     </div>
                 </div>';
        }
        else{
            array_push($response['errors'], array("error" => "add", "message" => "Error adding menu item into database")); 
        }
    }
    else{
        array_push($response['errors'], array("error" => "add", "message" => "Incomplete data supplied, error adding menu item into database")); 
    }
}
else
{
     array_push($response['errors'], array("error" => "request", "message" => "Access Denied"));
}

header('Content-Type: application/json');
echo json_encode($response);
 
?>
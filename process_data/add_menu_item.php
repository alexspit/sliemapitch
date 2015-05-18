<?php
if (session_status() == PHP_SESSION_NONE) 
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
    
    if(isset($_POST["menu_category_filter"]) && !empty($_POST["menu_category_filter"]))
    {
        $menuitem->category = new menu_category($db->filter($_POST["menu_category_filter"]));
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
    
    
    

    
?>
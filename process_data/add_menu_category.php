<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
    
include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';
include_once '../data_class/menu_category.php';

$db = new db_connection();
$category = new menu_category();

$response = array('success' => false, 'message' => "");


if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    if(isset($_POST["menucategory_name"]) && !empty($_POST["menucategory_name"]))
    {
        $category->category_name = $_POST["menucategory_name"];
        if($category->add() > 0){
            $response['success'] = true;
            $response['message'] = "New Category added successfully";
            $response['category'] = $category->get();
        }
        else{
            $response['message'] = "Failed to add new category. Contact Developer.";
        }
    }
    else
    {
      $response['message'] = "Category name not set";
    }
  
}
else
{
     $response['message'] = "Denied Access";
}
header('Content-Type: application/json');
echo json_encode($response);
   


    
?>
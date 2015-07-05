<?php
if (session_status() == PHP_SESSION_NONE) 
    {session_start();}
   
include_once '../data_class/db_connection.php';
include_once '../data_class/menu_category.php';

$db = new db_connection();
$category = new menu_category();

$response = array('success' => false, 'message' => "");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
        $category = new menu_category($db->filter($_GET["id"]));
        
        if($category->delete()){
            $response['success'] = true;
            $response['message'] = "Category deleted successfully";
            $response['id'] = $category->category_id;
        }
        else{
            $response['message'] = "Failed to delete category. Contact Developer.";
        }
    }
    else
    {
        $response['message'] = "No category selected";
    }

}
else
{
     $response['message'] = "Denied Access";
}
header('Content-Type: application/json');
echo json_encode($response);
      
    
    

    
?>
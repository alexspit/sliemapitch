<?php

include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';

$db = new db_connection();
$menuitem = new menu_item();
$string = "";

if(isset($_GET['id']) && !empty($_GET['id'])){
    //$category = new menu_category($db->filter($_GET['id']));
  // $string = $menuitem->getMenuItems(10, 1,$db->filter($_GET['id']));
   $category = $db->filter($_GET['id']);

    
}
else{
   // $string = $menuitem->getMenuItems(10, 1);
    $category = 0;
}

if(isset($_GET['limit']) && !empty($_GET['limit'])){
    //$category = new menu_category($db->filter($_GET['id']));
   $limit = $db->filter($_GET['limit']);
  
}
else{
    $limit = 10;
}


$string = $menuitem->getMenuItems($limit, 1,$category);


header('Content-Type: application/json');
echo json_encode(array('items'=>$string));

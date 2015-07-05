<?php

include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';

$db = new db_connection();
$menuitem = new menu_item();
$string = "";

if(isset($_GET['id']) && !empty($_GET['id'])){
    //$category = new menu_category($db->filter($_GET['id']));
   $string = $menuitem->getMenuItems(5, 1,$db->filter($_GET['id']));

    
}
else{
    $string = $menuitem->getMenuItems(5, 1);
}

header('Content-Type: application/json');
echo json_encode(array('items'=>$string));

<?php

include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';

$db = new db_connection();
$menuitem = new menu_item();
$string = "";

if(isset($_GET['page']) && !empty($_GET['page'])){
   $page = $db->filter($_GET['page']); 
}
else{
    $page = 1;
}

if(isset($_GET['limit']) && !empty($_GET['limit'])){
   $limit = $db->filter($_GET['limit']);
}
else{
    $limit = 10;
}


if(isset($_GET['category']) && !empty($_GET['category'])){
   $category = $db->filter($_GET['category']);
}
else
{
    $category = 0;
}

    $string = $menuitem->getMenuItems($limit, $page, $category);

header('Content-Type: application/json');
echo json_encode(array('items'=>$string));

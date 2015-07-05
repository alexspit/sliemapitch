<?php

include_once '../data_class/db_connection.php';
include_once '../data_class/menu_item.php';
include_once '../data_class/menu_category.php';

$db = new db_connection();
$menuitem = new menu_item($_GET['id']);

header('Content-Type: application/json');
echo json_encode($menuitem);
<?php

require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
  require 'menuPost.php';
  exit;
}

//all menu items

$menuItem = Menu::fetchAllMenuItems();

// 2. Convert to JSON

$json = json_encode($menuItem,  JSON_PRETTY_PRINT);

// 3. Print
header ('Content-type: application/json;charset=utf-8');

echo json_encode($menuItem);

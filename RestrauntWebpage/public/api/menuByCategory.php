<?php

require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
  require 'menuPost.php';
  exit;
}


$category = ($_GET['category'] ?? '');
//menu items based on category

$menuItem2 = Menu::fetchItemsByCategory($category);

// 2. Convert to JSON

$json = json_encode($menuItem2,  JSON_PRETTY_PRINT);

// 3. Print
header ('Content-type: application/json;charset=utf-8');

echo json_encode($menuItem2);

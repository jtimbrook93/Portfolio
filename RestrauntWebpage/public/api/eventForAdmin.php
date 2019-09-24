<?php

require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
  require 'eventPost.php';
  exit;
}


//for events that are labeled "true"
$eventItem = Event::fetchAllEventItems();

// 2. Convert to JSON

$json = json_encode($eventItem,  JSON_PRETTY_PRINT);

// 3. Print
header ('Content-type: application/json;charset=utf-8');

echo json_encode($eventItem);

<?php

require '../../app/common.php';

//for events that are labeled "true"
$eventTrueItem = Event::fetchTrueEvents();

// 2. Convert to JSON

$json = json_encode($eventTrueItem,  JSON_PRETTY_PRINT);

// 3. Print
header ('Content-type: application/json;charset=utf-8');

echo json_encode($eventTrueItem);

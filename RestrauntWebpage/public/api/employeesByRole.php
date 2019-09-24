<?php

require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

  exit;
}

$role = ($_GET['role'] ?? '');
// 1. Go to the database and get all work associated with the $taskId

$employeeItem2 = Employee::fetchEmployeesByRole($role);

// 2. Convert to JSON

$json = json_encode($employeeItem2,  JSON_PRETTY_PRINT);

// 3. Print
header ('Content-type: application/json;charset=utf-8');

echo json_encode($employeeItem2);

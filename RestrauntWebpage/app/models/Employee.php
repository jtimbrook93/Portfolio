<?php

class Employee
{
  public $employeeid;
  public $first_name;
  public $last_name;
  public $username;
  public $password;
  public $email;
  public $role;



  public function __construct($row){
  // creating a new object using 'id'

    $this->employeeid = $row['employeeid'];
    $this->first_name = $row['first_name'];
    $this->last_name = $row['last_name'];
    $this->username = $row['username'];
    $this->password = $row['password'];
    $this->email = $row['email'];
    $this->role = ($row['role']) ? ($row['role']) : '';
  }


  public static function fetchEmployees(){
    //database connection
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

    //run this query
    $sql = 'SELECT fist_name and last_name as name , role, email, employeeid FROM employee';


    //prepares the statement
    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute([


    ]);
    // 4. Handle the results into an array
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

      // 4.a. For each row, make a new work php object
      $employeeItem =  new Employee($row);
      array_push($arr, $employeeitem);
    }

    // 4.b. return the array of work objects
    return $arr;

  }

  public static function fetchEmployeesByRole($role){
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

    $sql = 'SELECT * FROM employee where role = ?';



    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute([$role]);


    // 4. Handle the results
    $arr2 = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

      // 4.a. For each row, make a new work php object
      $employeeItem2 =  new Employee($row);
      array_push($arr2, $employeeItem2);
    }

    // 4.b. return the array of work objects
    return $arr2;

  }
}
  //thinking an if statement to update employee table if username and password match, and if role is admin?

  // public static function fetchEmployeesById(){
  //   $db = new PDO(DB_NAME, DB_USER, DB_PW);
  //
  //   $sql = 'SELECT fist_name and last_name as name , role, employeeid FROM employee where role = ?';
  //
  //
  //
  //   $statement = $db->prepare($sql);
  //
  //   // 3. Run the query
  //   $success = $statement->execute([$role]);
  //
  //
  //   // 4. Handle the results
  //   $arr2 = [];
  //   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  //
  //     // 4.a. For each row, make a new work php object
  //     $employeeItem2 =  new Employee($row);
  //     array_push($arr2, $employeeitem2);
  //   }
  //
  //   // 4.b. return the array of work objects
  //   return $arr2;
  //
  // }

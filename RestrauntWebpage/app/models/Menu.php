<?php

class Menu

{
  public $id;
  public $name;
  public $price;
  public $descrip;
  public $category;
  public $display;


  public function __construct($row) {
   // creating a new object instance using 'id' as integer

    $this->id = intval($row['id']);
    $this->name = ($row['name']);
    $this->price = floatval($row['price']);
    $this->descrip = ($row['descrip']);
    $this->category = ($row['category']) ? ($row['category']) : '';
    $this->display = ($row['display']);

  }
  public function fetchAllMenuItems() {

    //this log in information will be provided in the Common.php file
    // 1. Connect to the database
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM menu';
    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute(

    );

    // 4. Handle the results and add to arr
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

      // 4.a. For each row, make a new menu php object
      $menuItem =  new Menu($row);
      array_push($arr, $menuItem);

    }

    // 4.b. return the array of menu objects
    return $arr;
  }

  //this is the query for returing menu items based on a parameter passed in the url for category which we will set to a dropdown selection in java.
// if thats too much to handle, just hard code the query to be where category = 'Desserts', and repeat for each category, then call these functions based on user input.
  public function fetchItemsByCategory($category) {

    //this log in information will be provided in the Common.php file
    // 1. Connect to the database
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM menu where category = ?';

    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute([$category]);

    // 4. Handle the results and add to arr2 to be filled with certain categories
    $arr2 = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

      // 4.a. For each row, make a new menu php object
      $categoryItem =  new Menu($row);
      array_push($arr2, $categoryItem);

    }

    // 4.b. return the array of menu objects for a certain category
    return $arr2;
  }

  //this is the function that is called when you wish to create a new menu item, you pass all the params in a text box and they populate to the givin ?'s'
  public function create() {
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

  $sql = 'INSERT INTO Desserts (id, name, price, descrip, category, display)
          VALUES (?,?,?,?,?,?)';



    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute([
      $this->id,
      $this->name,
      $this->price,
      $this->descrip,
      $this->category,
      $this->display
    ]);
        $this->id = $db->lastInsertId();
  }
}

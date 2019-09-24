<?php

class Event

{
  public $eventid;
  public $title;
  public $date;
  public $description;
  public $display;


  public function __construct($row) {
   // creating a new object instance using 'id' as integer

    $this->eventid = isset($row['eventid']) ? intval($row['eventid']) : null;
    $this->title = ($row['title']);
    $this->date = Date($row['date']);
    $this->description = ($row['description']);
    $this->display = ($row['display']);

  }
  public function fetchAllEventItems() {

    //this log in information will be provided in the Common.php file
    // 1. Connect to the database
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM Events';
    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute(

    );

    // 4. Handle the results and add to arr
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

      // 4.a. For each row, make a new event php object
      $eventItem =  new Event($row);
      array_push($arr, $eventItem);

    }

    // 4.b. return the array of event objects
    return $arr;
  }

  //this is the query for returing event items based on a parameter passed in the url for category which we will set to a dropdown selection in java.
// if thats too much to handle, just hard code the query to be where category = 'Desserts', and repeat for each category, then call these functions based on user input.
  public function fetchTrueEvents() {

    //this log in information will be provided in the Common.php file
    // 1. Connect to the database
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM Events where display = "YES"';
    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute(

    );

    // 4. Handle the results and add to arr2 to be filled with certain categories
    $arr2 = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

      // 4.a. For each row, make a new event php object
      $trueEvent =  new Event($row);
      array_push($arr2, $trueEvent);

    }

    // 4.b. return the array of menu objects for a certain category
    return $arr2;
  }

  //this is the function that is called when you wish to create a new menu item, you pass all the params in a text box and they populate to the givin ?'s'
  public function create() {
    $db = new PDO(DB_NAME, DB_USER, DB_PW);

  $sql = 'INSERT INTO Events (eventid, title, date, discription, display)
          VALUES (?,?,?,?,?)';



    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute([
      $this->eventid,
      $this->title,
      $this->date,
      $this->description,
      $this->display
    ]);
        $this->eventid = $db->lastInsertId();
  }
}

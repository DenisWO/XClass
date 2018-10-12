<?php
  include './../connection/Connection.php';
  include './../bean/Activity.php';

  class Activity() {
    public function __construct() {
      try {
        connection();
      }catch(CannotConnectSQLException $e) {
        throw $e;
      }
    }

    //Save a new Activity
    public function save($objectActivity) {
      if (get_class($objectActivity) == "Activity") {
        throw new WrongObjectException("Wrong object" , "Activity" , get_class($objectActivity));
      }
    }

    //Update an existing Activity
    public function update($objectActivity) {
      if (get_class($objectActivity) == "Activity") {
        throw new WrongObjectException("Wrong object" , "Activity" , get_class($objectActivity));
      }

    }

    //Load ALL Activities
    public function loadAll() {

    }

    //Loads only the id specific Activity
    public function loadId($id) {

    }

    //Delete an existing Activity
    public function delete() {

    }
  }

?>

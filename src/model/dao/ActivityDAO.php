<?php
  include_once './../../connection/Connection.php';
  include_once './../bean/Activity.php';
  include_once './../../errors/WrongObjectException.php';

  class Activity() {
    public function __construct() {

    }

    //Save a new Activity
    public function save($objectActivity) {
      if (get_class($objectActivity) == "Activity") {
        throw new WrongObjectException("Activity" , get_class($objectActivity));
      }
    }

    //Update an existing Activity
    public function update($objectActivity) {
      if (get_class($objectActivity) == "Activity") {
        throw new WrongObjectException("Activity" , get_class($objectActivity));
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

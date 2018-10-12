<?php
  include './../connection/Connection.php';
  include './../bean/ActivityDelivery.php';

  class Class() {
    public function __construct() {
      //Default constructor
    }

    //Save a new ActivityDelivery
    public function save($objectActivityDelivery) {
      if (get_class($objectActivityDelivery) == "Class") {
        throw new WrongObjectException("Wrong object" , "ActivityDelivery" , get_class($objectActivityDelivery));
      }
      
    }

    //Update an existing ActivityDelivery
    public function update($objectActivityDelivery) {
      if (get_class($objectActivityDelivery) == "Class") {
        throw new WrongObjectException("Wrong object" , "ActivityDelivery" , get_class($objectActivityDelivery));
      }

    }

    //Load ALL ActiviesDelivery
    public function loadAll() {

    }

    //Loads only the id specific ActivityDelivery
    public function loadId($id) {

    }

    //Delete an existing ActivityDelivery
    public function delete() {

    }
  }

?>

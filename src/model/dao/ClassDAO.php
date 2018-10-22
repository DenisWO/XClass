<?php
  include './../connection/Connection.php';
  include './../bean/Class.php';

  class Class() {
    public function __construct() {
      
    }

    //Save a new Class
    public function save($objectClass) {
      if (get_class($objectClass) == "Class") {
        throw new WrongObjectException("Wrong object" , "Class" , get_class($objectClass));
      }
    }

    //Update an existing Class
    public function update($objectClass) {
      if (get_class($objectClass) == "Class") {
        throw new WrongObjectException("Wrong object" , "Class" , get_class($objectClass));
      }

    }

    //Load ALL Classes
    public function loadAll() {

    }

    //Loads only the id specific Class
    public function loadId($id) {

    }

    //Delete an existing Class
    public function delete() {

    }
  }

?>

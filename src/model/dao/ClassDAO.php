<?php

  include_once './../../connection/Connection.php';
  include_once './../bean/Class.php';
  include_once './../../errors/WrongObjectException.php';

  class Class() {

    public function __construct() {

    }

    //Save a new Class
    public function save($objectClass) {
      if (get_class($objectClass) == "Class") {
        throw new WrongObjectException("Class" , get_class($objectClass));
      }
    }

    //Update an existing Class
    public function update($objectClass) {
      if (get_class($objectClass) == "Class") {
        throw new WrongObjectException("Class" , get_class($objectClass));
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

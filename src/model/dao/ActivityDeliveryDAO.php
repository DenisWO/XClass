<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/ActivityDelivery.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';

  class Class() {
    private $conector;
    public function __construct() {
      $this->conector = getConnection();
    }
    
    //Save a new ActivityDelivery
    public function save($objectActivityDelivery) {
      if (get_class($objectActivityDelivery) == "Class") {
        throw new WrongObjectException("ActivityDelivery" , get_class($objectActivityDelivery));
      }

    }

    //Update an existing ActivityDelivery
    public function update($objectActivityDelivery) {
      if (get_class($objectActivityDelivery) == "Class") {
        throw new WrongObjectException("ActivityDelivery" , get_class($objectActivityDelivery));
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

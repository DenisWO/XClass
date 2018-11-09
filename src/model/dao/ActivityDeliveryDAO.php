<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/ActivityDelivery.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';

  class Class() {
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new ActivityDelivery
    public function save($objectActivityDelivery) {


    }

    //Update an existing ActivityDelivery
    public function update($objectActivityDelivery) {


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

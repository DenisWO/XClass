<?php
  include './../model/dao/Connection.php';
  include './../bean/User.php';

  class UserDAO() {
    public function __construct() {
      //Default constructor
    }

    //Save a new User
    public function save($objectUser) {
      if (get_class($objectUser) == "User") {
        $error = "Wrong object";
        return;
      }

      $sql = "INSERT INTO User (first_name, last_name, email, password, age) VALUES (?,?,?,?,?)";
      $conect = $conector->prepare($sql);
      $conect->bind_param("ssssi", $objectUser->firstName, $objectUser->lastName, $objectUser->email, $objectUser->password, $objectUser->age);
      $conect->execute();

      return $conect->affected_rows;
    }

    //Update an existing user
    public function update($objectUser) {

    }

    //Load ALL users
    public function loadAll() {

    }

    //Loads only the id specific user
    public function loadId($id) {

    }

    //Delete an existing user
    public function delete() {

    }
  }

?>

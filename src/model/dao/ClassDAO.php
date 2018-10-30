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
      $sql = "INSERT INTO classes (teacher_id, name, instituiton, created_at, updated_at)
       VALUES (?,?,?,?,?)";
      $stmt = $conector->prepare($sql);
      $stmt->bind_param('issss', $objectClass->getTeacher()->getId(), $objectClass->getName(), $objectClass->getInstituiton(),
      $objectClass->getCreated_at(), $objectClass->getUpdated_At());

      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
      $stmt->execute();
      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
    }
    public function saveStudent($objectClass, $user){
      if(get_class($objectClass) == "Class"){
        throw new WrongObjectException("Class", get_class($objectClass));
      }
      $sql = "INSERT INTO students (class_id, user_id, created_at, updated_at) VALUES (?,?,?,?)";
      $stmt = $conector->prepare($sql);
      $stmt->bind_param("iiss", $objectClass->getId(), $user->getId(), $objectClass->getCreated_at(), $objectClass->getUpdated_At());

      if (!$stmt) {
        throw new SQLException($stmt , $sql);
      }

      $stmt->execute();
      if (!$stmt) {
        throw new SQLException($stmt , $sql);
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

<?php
  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/Activity.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';

  class ActivityDAO {
    public function __construct() {

    }

    //Save a new Activity
    public function save($objectActivity) {
      if (get_class($objectActivity) == "Activity") {
        throw new WrongObjectException("Activity" , get_class($objectActivity));
      }
      $sql = "INSERT INTO activities (class_id, name, description, date_delivery, created_at, updated_at)
      VALUES (?,?,?,?,?,?)";
      $stmt = $conector->prepare($sql);
      $stmt->bind_param("isssss", $objectActivity->getClassId(), $objectActivity->getName(), $objectActivity->getDescription(),
      $objectActivity->getDateDelivery(), $objectActivity->getCreatedAt(), $objectActivity->getUpdatedAt());

      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
      $stmt->execute();
      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
    }

    //Update an existing Activity
    public function update($objectActivity) {
      if (get_class($objectActivity) == "Activity") {
        throw new WrongObjectException("Activity" , get_class($objectActivity));
      }
      $sql = "UPDATE activities SET class_id = ?, name = ?, description = ?, date_delivery = ?, created_at = ?,
      updated_at = ? WHERE id = ?";
      $stmt = $conector->prepare($sql);
      $stmt->bind_param("isssss", $objectActivity->getClassId(), $objectActivity->getName(),
      $objectActivity->getDescription(), $objectActivity->getDateDelivery(), $objectActivity->getCreatedAt(), $objectActivity->getUpdatedAt());
      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
      $stmt->execute();
      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
    }

    //Load ALL Activities
    public function loadAll() {
      $sql = "SELECT * FROM activities";
      $stmt = $conector->query($sql);
      return $stmt;
    }

    //Loads only the id specific Activity
    public function loadId($id) {
      $sql = "SELECT * FROM activities WHERE id = " . $id;
      $stmt = $conector->query($sql);
      return $stmt;
    }

    //Delete an existing Activity
    public function deleteAll() {
      $sql = "DELETE FROM activities";
      $stmt = $conector->query($sql);
    }
    public function deleteById($id){
      $sql = "DELETE FROM activities WHERE id = " . $id;
      $stmt = $conector->query($sql);
    }
  }

?>

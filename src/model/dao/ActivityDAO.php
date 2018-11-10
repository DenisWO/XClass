<?php
  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/Activity.php';

  class ActivityDAO {
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new Activity
    public function save($objectActivity, $class) {


      $sql = "INSERT INTO activities (class_id, name, description, date_delivery)
      VALUES (
        {$class->getId()},
        '{$objectActivity->getName()}',
        '{$objectActivity->getDescription()}',
        '{$objectActivity->getDateDelivery()}'
      )";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

    //Update an existing Activity
    public function update($objectActivity){
        $sql = "UPDATE activities SET name = '{$objectActivity->getName()}',
        description = '{$objectActivity->getDescription()}', date_delivery = '{$objectActivity->getDateDelivery()}',
        id = {$objectActivity->getId()} WHERE id = {$objectActivity->getId()}";
        echo $sql;
        if($this->conn->query($sql) === TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    //Load ALL Activities
    public function loadAll() {
      $sql = "SELECT * FROM activities";
      $stmt = $this->conn->query($sql);

      $activities = array();

      while($dados = $stmt->fetch_array()){

        $activity = new Activity(
          $dados["id"],
          $dados["name"],
          $dados["description"],
          $dados["date_delivery"]
        );

        array_push($activities , $activity);
    	}

      return $activities;
    }

    public function loadClass($classId) {
      $sql = "SELECT * FROM activities WHERE class_id = {$classId}";
      $stmt = $this->conn->query($sql);

      $activities = array();

      while($dados = $stmt->fetch_array()){

        $activity = new Activity(
          $dados["id"],
          $dados["name"],
          $dados["description"],
          $dados["date_delivery"]
        );

        array_push($activities , $activity);
    	}

      return $activities;
    }

    //Loads only the id specific Activity
    public function loadId($id) {
      $sql = "SELECT * FROM activities WHERE id = {$id}";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $activity = new Activity(
          $dados["id"],
          $dados["name"],
          $dados["description"],
          $dados["date_delivery"]
        );

        return $activity;
    	}

      return FALSE;
    }

    public function delete($objectActivity){
      $sql = "DELETE FROM activities WHERE id = {$objectActivity->getId()}";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }
  }

?>

<?php
  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/Activity.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';

  class ActivityDAO {
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new Activity
    public function save($objectActivity) {

      $class = $objectActivity->getClass();

      $sql = "INSERT INTO activities (class_id, name, description, date_delivery) VALUES ($class->getId(), $objectActivity->getName() , $objectActivity->getDescription() , $objectActivity->getDateDelivery())";
      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

    //Update an existing Activity
    public function update($objectActivity) {

    }

    //Load ALL Activities
    public function loadAll() {
      $activities = array();
      $sql = "SELECT * FROM activities";
      $stmt = $this->conn->query($sql);

      $nlinhas = $stmt->num_rows;

    	if($nlinhas > 0){
    		$activities = array();

    		while($linha = mysqli_fetch_array($stmt)){
    			extract($linha);


    			$cliEncontrado = array(
            "id" => $id,
            "name" => $name,
            "description" => $description,
            "date_delivery" => $dateDelivery
    			);
    			array_push($activities, $cliEncontrado);
    		}
    	}

      return $activities;
    }

    //Loads only the id specific Activity
    public function loadId($id) {
      $sql = "SELECT * FROM activities WHERE id = $id";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $activity = new Activity(
          $dados["id"],
          $dados["name"],
          $dados["description"],
          $dados["date_delivery"],
        );

        return $activity;
    	}

      return FALSE;
    }

    public function delete($objectActivity){
      $sql = "DELETE FROM activities WHERE id = $objectActivity->id";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }
  }

?>

<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/XClass.php';

  class XClassDAO{
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new XClass
    public function save($objectClass) {

      $teacher = $objectClass->getTeacher();

      $sql = "INSERT INTO XClasses (teacher_id,name,instituiton,year,semester) VALUES ($teacher->getId() , $objectClass->getName() , $objectClass->getInstituiton() , $objectClass->getYear() , $objectClass->getSemester())";
      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

    //Update an existing Class
    public function update($objectClass) {

    }

    //Load ALL Classes
    public function loadAll() {
      $sql = "SELECT * FROM XClasses";
      $stmt = $this->conn-FALSE>query($sql);

      $xClasses = array();

      while($dados = $stmt->fetch_array()){

        $xClass = new XClass(
          $dados["id"],
          $dados["name"],
          $dados["teacher_id"],
          $dados["instituiton"],
          $dados["year"],
          $dados["semester"]
        );

        array_push($xClasses , $xClass);
    	}

      return $xClasses;
    }

    //Loads only the id specific Class
    public function loadId($id) {
      $sql = "SELECT * FROM XClasses WHERE id = $id";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $xClass = new XClass(
          $dados["id"],
          $dados["name"],
          $dados["teacher_id"],
          $dados["instituiton"],
          $dados["year"],
          $dados["semester"]
        );

        return $xClass;
    	}

      return FALSE;
    }

    //Delete an existing Class
    public function delete($objectClass) {
      $sql = "DELETE FROM XClasses WHERE id = $objectClass->id";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

  }

?>

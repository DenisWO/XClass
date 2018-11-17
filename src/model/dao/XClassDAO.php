<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/XClass.php';
  include_once __DIR__ . '/../bean/User.php';
  include_once __DIR__ . '/UserDAO.php';

  class XClassDAO{
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new XClass
    public function save($objectClass) {

      $teacher = $objectClass->getTeacher();

      $sql = "INSERT INTO XClasses (teacher_id,name,institution,year,semester) VALUES ({$teacher->getId()} , '{$objectClass->getName()}' , '{$objectClass->getInstitution()}', '{$objectClass->getYear()}', '{$objectClass->getSemester()}')";
      echo $sql;
      $sql = "INSERT INTO XClassess (teacher_id,name,institution,year,semester)
      VALUES (
         {$teacher->getId()},
        '{$objectClass->getName()}',
        '{$objectClass->getInstitution()}',
        '{$objectClass->getYear()}',
        '{$objectClass->getSemester()}'
      )";

      if ($this->conn->query($sql) === TRUE) {
        return TRUE;
      }
      else {
        return FALSE;
      }
    }

    //Update an existing Class
    public function update($objectClass) {
      $teacher = $objectClass->getTeacher();
      $sql = "UPDATE XClasses SET teacher_id = {$teacher->getId()}, name = '{$objectClass->getName()}', institution = '{$objectClass->getInstitution()}', year = '{$objectClass->getYear()}', semester = '{$objectClass->getSemester()}', id = {$objectClass->getId()} WHERE id= '{$objectClass->getId()}'";
      $sql = "UPDATE XClasses SET teacher_id = {$teacher->getId()}, name = '{$objectClass->getName()}', institution = '{$objectClass->getInstitution()}', year = '{$objectClass->getYear()}', semester = '{$objectClass->getSemester()}' WHERE id= {$objectClass->getId()}";
      if ($this->conn->query($sql) === TRUE) {
        return TRUE;
      } else {
          return FALSE;
      }

    }

    //Load ALL Classes
    public function loadAll() {
      $sql = "SELECT * FROM XClasses";
      $stmt = $this->conn->query($sql);

      $xClasses = array();

      while($dados = $stmt->fetch_array()){
        $teacher_id = $dados["teacher_id"];
        $dao = new UserDAO();
        $teacher = $dao->loadId($teacher_id);

        $xClass = new XClass(
          $dados["id"],
          $dados["name"],
          $dados["institution"],
          $teacher,
          $dados["year"],
          $dados["semester"]
        );

        array_push($xClasses , $xClass);
    	}

      return $xClasses;
    }

    //Loads only the id specific Class
    public function loadId($id) {
      $sql = "SELECT * FROM XClasses WHERE id = {$id}";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){
        $teacher_id = $dados["teacher_id"];
        $dao = new UserDAO();
        $teacher = $dao->loadId($teacher_id);

        $xClass = new XClass(
          $dados["id"],
          $dados["name"],
          $dados["institution"],
          $teacher,
          $dados["year"],
          $dados["semester"]
        );
        return $xClass;
    	}

      return FALSE;
    }
    public function loadLastId(){
        $sql = "SELECT MAX(id) FROM XClasses";
        $stmt = $this->conn->query($sql);
        if($id = $stmt->fetch_array()){
            return $id[0];
        }
        return FALSE;
    }
    public function loadTeacher($idTeacher){
        $sql = "SELECT * FROM XClasses WHERE teacher_id = {$idTeacher}";
        $stmt = $this->conn->query($sql);

        $xClasses = array();

        while($dados = $stmt->fetch_array()){
          $teacher_id = $dados["teacher_id"];
          $dao = new UserDAO();
          $teacher = $dao->loadId($teacher_id);

          $xClass = new XClass(
            $dados["id"],
            $dados["name"],
            $dados["institution"],
            $teacher,
            $dados["year"],
            $dados["semester"]
          );

          array_push($xClasses , $xClass);
      	}

        return $xClasses;
    }

    //Delete an existing Class
    public function delete($objectClass) {
      $sql = "DELETE FROM XClasses WHERE id = {$objectClass->getId()}";

      if ($this->conn->query($sql) === TRUE) {
        return TRUE;
      } else {
          return FALSE;
      }
    }

  }

?>

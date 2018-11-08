<?php

  include_once '../../connection/Connection.php';
  include_once '../bean/XClass.php';
  include_once '../../errors/WrongObjectException.php';
  include_once '../../errors/SQLException.php';

  class XClassDAO{

    private $conector;

    public function __construct($bd) {
      $this->conector = $bd;
    }
    //Save a new XClass
    public function save($objectClass) {

      if (get_class($objectClass) !== "XClass") {
        throw new WrongObjectException("XClass" , get_class($objectClass));
      }

      $params = "(" . $objectClass->getTeacher()->getId() . ", '" . $objectClass->getName() . "', '" .
      $objectClass->getInstituiton() . "', '" . $objectClass->getCreated_at() . "', '" .
      $objectClass->getUpdated_At() . "')";

      $sql = "INSERT INTO classes (teacher_id, name, instituiton, created_at, updated_at) VALUES " . $params;
      $stmt = $this->conector->prepare($sql);
      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
      $stmt->execute();
      if(!$stmt){
        throw new SQLException($stmt, $sql);
      }
      echo "Inclusao da classe completa!";
    }
    public function saveStudent($objectClass, $user){
      if(get_class($objectClass) == "XClass"){
        throw new WrongObjectException("XClass", get_class($objectClass));
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
    }

    //Update an existing Class
    public function update($objectClass) {
      if (!get_class($objectClass) == "XClass") {
        throw new WrongObjectException("XClass" , get_class($objectClass));
      }
      else{
        $sql = "UPDATE class SET name = ?, instituiton = ?, teacher_id = ?, updated_at = ? WHERE id = ?";
        $stmt = $conector->prepare($sql);
        $objectClass->setUpdated_at(); //Passar data do momento da atualização
        $stmt->bind_param("ssisi", $objectClass->getName(), $objectClass->getInstituiton(),
        $objectClass->getTeacher()->getId(), $objectClass->getUpdated_At(), $objectClass->getId());
        if (!$stmt) {
          throw new SQLException($stmt , $sql);
        }

        $stmt->execute();
        if (!$stmt) {
          throw new SQLException($stmt , $sql);
        }
      }

    }

    //Load ALL Classes
    public function loadAll() {
      $sql = "SELECT * FROM class";
      $stmt = $conector->query($sql);
      return $stmt;
    }

    //Loads only the id specific Class
    public function loadId($id) {
      $sql = "SELECT * FROM class WHERE id = " . $id;
      $stmt = $conector->query($sql);
      return $stmt;
    }

    //Delete an existing Class
    public function deleteAll() {
      $this->deleteAllStudents();
      $sql = "DELETE FROM classes";
      $stmt = $conector->query($sql);
    }
    public function deleteById($id){
      $this->deleteStudentById($id);
      $sql = "DELETE FROM classes WHERE id = " . $id;
      $stmt = $conector->query($sql);
    }
    public function deleteStudentById($classId){
      $sql = "DELETE FROM students WHERE class_id = " . $id;
      $stmt = $conector->query($sql);
    }
    public function deleteAllStudents(){
      $sql = "DELETE FROM students";
      $stmt = $conector->query($sql);
    }
    public function deleteOneStudent($classId, $studentId){
      $sql = "DELETE FROM students WHERE class_id = " . $classId . " AND user_id = " . $studentId;
      $stmt = $conector->query($sql);
    }

  }

?>

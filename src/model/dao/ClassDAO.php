<?php

  include_once './../../connection/Connection.php';
  include_once './../bean/Class.php';
  include_once './../../errors/WrongObjectException.php';

  class ClassDAO{

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
      if (!get_class($objectClass) == "Class") {
        throw new WrongObjectException("Class" , get_class($objectClass));
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

    //Load ALL Classes
    public function loadAll() {
      $sql = "SELECT * FROM class";
      $stmt = $conector->query($sql);
      while($dados = $stmt->fetch_array());
      return $dados;
    }

    //Loads only the id specific Class
    public function loadId($id) {
      $sql = "SELECT * FROM class WHERE id = " . $id;
      $stmt = $conector->query($sql);
      while($dados = $stmt->fetch_array());
      return $dados;
    }

    //Delete an existing Class
    public function delete() {
      $this->deleteStudents();
      $sql = "DELETE FROM class";
      $stmt = $conector->query($sql);
    }
    public function deleteId($id){
      $this->deleteAllStudents($id);
      $sql = "DELETE FROM class WHERE id = " . $id;
      $stmt = $conector->query($sql);
    }
    public function deleteAllStudents($classId){
      $sql = "DELETE FROM students' WHERE class_id = " . $id;
      $stmt = $conector->query($sql);
    }
    public function deleteStudents(){
      $sql = "DELETE FROM students";
      $stmt = $conector->query($sql);
    }
    public function deleteOneStudent($classId, $studentId){
      $sql = "DELETE FROM students WHERE class_id = " . $classId " AND user_id = " . $studentId;
      $stmt = $conector->query($sql);
    }

  }

?>

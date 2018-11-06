<?php

  class Class{

    private $id;
    private $name;
    private $instituiton;
    private $teacher;  //Objeto usuario, declarado como professor
    private $created_at; //Object  Timestamp
    private $updated_at; //Object Timestamp
    private $students; //Array de objetos usuarios, usados como alunos


    public function __construct($id, $name, $instituiton, $teacher, $updated_at, $created_at) {
      $this->setId($id);
      $this->setName($name);
      $this->setInstituiton($instituiton);
      $this->setTeacher($teacher);
      $this->setUpdated_at($updated_at);
      $this->setCreated_at($created_at);
      $this->students = array();
    }
    public function getId(){
      return $this->id;
    }
    public function getName(){
      return $this->name;
    }
    public function getInstituiton(){
      return $this->instituiton;
    }
    public function getTeacher(){
      return $this->teacher;
    }
    public function getCreated_At(){
      return $this->created_at;
    }
    public function getUpdated_At(){
      return $this->updated_at;
    }
    public function getStudents(){
      return $this->students;
    }
    public function setId($id){
      $this->id = $id;
    }
    public function setName($name){
      $this->name = $name;
    }
    public function setInstituiton($instituiton){
      $this->instituiton = $instituiton;
    }
    public function setTeacher($teacher){
      if(isset($teacher)){
        $this->teacher = $teacher;
      }
    }
    public function setUpdated_at($updated_at){
      $this->updated_at = $updated_at;
    }
    public function setCreated_at($created_at){
      $this->created_at = $created_at;
    }
    public function setStudents($student){
      if(isset($student)){
        array_push($this->students, $student);
      }
    }
    public function removeStudent($student){
      $index = array_search($student, $this->students)
      if($index){
        unset($this->students[$index]);
      }
    }

  }

?>

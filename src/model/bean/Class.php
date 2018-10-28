<?php

  class Class{

    private $id;
    private $name;
    private $instituiton;
    private $teacherId;
    private $year;
    private $semester;    //Porque precisa de um semestre para a turma?
    private $created_at; //Object  Timestamp
    private $updated_at; //Object Timestamp


    public function __construct($id, $name, $instituiton, $teacherId, $year, $semester, $updated_at, $created_at) {
      $this->setId($id);
      $this->setName($name);
      $this->setInstituiton($instituiton);
      $this->setTeacherId($teacherId);
      $this->setYear($year);
      $this->setSemester($semester);
      $this->setUpdated_at($updated_at);
      $this->setCreated_at($created_at);
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
    public function getTeacherId(){
      return $this->teacherId;
    }
    public function getYear(){
      return $this->year;
    }
    public function getSemester(){
      return $this->semester;
    }
    public function getCreated_At(){
      return $this->created_at;
    }
    public function getUpdated_At(){
      return $this->updated_at;
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
    public function setTeacherId($teacherId){
      $this->teacherId = $teacherId;
    }
    public function setYear($year){
      $this->year = $year;
    }
    public function setSemester($semester){
      $this->semester = $semester;
    }
    public function setUpdated_at(){
      $this->updated_at = $updated_at;
    }
    public function setCreated_at(){
      $this->created_at = $created_at;
    }

  }

?>

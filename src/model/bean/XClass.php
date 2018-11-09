<?php
  include_once 'User.php';

  class XClass{

    private $id;
    private $name;
    private $institution;
    private $teacher;  //Objeto usuario, declarado como professor
    private $year;
    private $semester;
    private $students; //Array de objetos usuarios, usados como alunos
    private $activities; //Array de atividades

    public function __construct($id, $name, $institution, $teacher, $year, $semester){
      $this->setId($id);
      $this->setName($name);
      $this->setInstitution($institution);
      $this->setTeacher($teacher);
      $this->setYear($year);
      $this->setSemester($semester);
      $this->students = array();
      $this->activities = array();
    }
    public function getId(){
      return $this->id;
    }
    public function getName(){
      return $this->name;
    }
    public function getInstitution(){
      return $this->institution;
    }
    public function getTeacher(){
      return $this->teacher;
    }
    public function getStudents(){
      return $this->students;
    }
    public function getYear(){
      return $this->year;
    }
    public function getSemester(){
      return $this->semester;
    }
    public function setId($id){
      $this->id = $id;
    }
    public function setName($name){
      $this->name = $name;
    }
    public function setInstitution($institution){
      $this->institution = $institution;
    }
    public function setTeacher($teacher){
      if(isset($teacher)){
        $this->teacher = $teacher;
      }
    }
    public function setYear($year){
      $this->year = $year;
    }
    public function setSemester($semester){
      $this->semester = $semester;
    }
    public function setStudents($student){
      if(isset($student)){
        array_push($this->students, $student);
      }
    }
    public function removeStudent($student){
      $index = array_search($student, $this->students);
      if($index){
        unset($this->students[$index]);
      }
    }
    public function setActivity($activity){
      if(isset($activity)){
        array_push($activity, $this->$activities);
      }
    }
    public function getActivities(){
      return $this->activities;
    }
    public function addActivity($activity){
      if(isset($activity)){
        $this->activities[] = $activity;
      }
    }
    public function removeActivity($activity){
      $index = array_search($activity, $this->activities);
        if($index){
          unset($this->activities[$index]);
        }
    }

  }

?>

<?php

  classId Activity{
    private $id; //Id da atividade
    private $classId; //classe ao qual a atividade está ligada
    private $name;
    private $description;
    private $dateDelivery;

    public function __construct($id, $classId, $name, $description, $dateDelivery) {
      $this->setId($id);
      $this->setclassId($classId);
      $this->setName($name);
      $this->setDescription($description);
      $this->setDateDelivery($dateDelivery);
    }
    public setId($id){
      $this->id = $id;
    }
    public setClassId($classId){
      $this->classId = $classId;
    }
    public setName($name){
      $this->name = $name;
    }
    public setDescription($description){
      $this->description = $description;
    }
    public setDateDelivery($dateDelivery){
      $this->dateDelivery = $dateDelivery;
    }
    public getId(){
      return $this->id;
    }
    public getClassId(){
      return $this->classId;
    }
    public getName(){
      return $this->name;
    }
    public getDescription(){
      return $this->description;
    }
    public getDateDelivery(){
      return $this->dateDelivery;
    }
  }

?>

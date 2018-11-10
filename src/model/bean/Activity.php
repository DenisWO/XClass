<?php

  class Activity{
    private $id; //Id da atividade
    private $name;
    private $description;
    private $dateDelivery;

    public function __construct($id, $name, $description, $dateDelivery) {
      $this->setId($id);
      $this->setName($name);
      $this->setDescription($description);
      $this->setDateDelivery($dateDelivery);
    }
    public function setId($id){
      $this->id = $id;
    }
    public function setName($name){
      $this->name = $name;
    }
    public function setDescription($description){
      $this->description = $description;
    }
    public function setDateDelivery($dateDelivery){
      $this->dateDelivery = $dateDelivery;
    }
    public function getId(){
      return $this->id;
    }
    public function getName(){
      return $this->name;
    }
    public function getDescription(){
      return $this->description;
    }
    public function getDateDelivery(){
      return $this->dateDelivery;
    }
  }

?>

<?php

  class Activity{
    private $id;
    private $class;
    private $name;
    private $description;
    private $dateDelivery;
    private $updated_at;
    private $created_at;
    
    public function __construct($id, $class, $name, $description, $dateDelivery, $updated_at, $created_at) {
      $this->setId($id);
      $this->setClass($class);
      $this->setName($name);
      $this->setDescription($description);
      $this->setDateDelivery($dateDelivery);
      $this->setUpdatedAt($updated_at);
      $this->setCreatedAt($created_at);
    }
    public setId($id){
      $this->id = $id;
    }
    public setClass($class){
      $this->class = $class;
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
    public setUpdatedAt($updated_at){
      $this->updated_at = $updated_at;
    }
    public setCreatedAt($created_at){
      $this->created_at = $created_at;
    }
    public getId(){
      return $this->id;
    }
    public getClass(){
      return $this->class;
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
    public getUpdatedAt(){
      return $this->updated_at;
    }
    public getCreatedAt(){
      return $this->created_at;
    }
  }

?>

<?php

  class User{

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;   // Nao sei se a senha deve ficar aqui !!!!
    private $age;
    private $created_at; // Object Timestamp
    private $updated_at; // Object Timestamp
    private $photo;      // Object Attachment -> Profile Photo
    private $thumbnail;  // Object Attachment -> Low resolution profile photo

    public function __construct($firstName , $lastName , $email , $password , $age) {
      $this->setFirstName($firstName);
      $this->setLastName($lastName);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setAge($age);
      $this->setCreated_at();
      $this->setUpdated_at();

      // add photo default using AttachmentManager
      // add thumbnail default using AttachmentManager
    }
    public function __construct($name, $email, $password){
      $this->setFirstName($name);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setCreated_at();
      $this->setUpdated_at();
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getFirstName() {
      return $this->firstName;
    }

    public function setFirstName($firstName) {
      $this->firstName = $firstName;
    }

    public function getLastName() {
      return $this->lastName;
    }

    public function setLastName($lastName) {
      $this->lastName = $lastName;
    }

    public function getEmail() {
      return $this->email;
    }

    public function setEmail($email) {
      $this->email-> $email;
    }

    public function getPassword() {
      return $this->password;
    }

    public function setPassword($password) {
      $this->password = $password;
    }

    public function getAge() {
      return $this->age;
    }

    public function setAge($age) {
      if ($age < 0 | $age >120) {
        $error = "Improbable age";
        return $error;
      }else{
        $this->age = $age;
      }
    }

    public function getCreated_At() {
      return $this->created_at;
    }

    private function setCreated_at() {
      if (empty($this->created_at)) {
        $this->created_at = date('Y-m-d H:i:s');
      }else{
        $error = "Can only be created once";
        return error;
      }
    }

    public function getUpdated_At() {
      return $this->updated_at;
    }

    private function setUpdated_at() {
      $this->updated_at = date('Y-m-d H:i:s');
    }

    public function getPhoto() {
      return $this->photo;
    }

    public function setPhoto($photo) {
      // Usar a classe AttachmentManager futuramente
      // O $thumbnail sera gerado com ela tambem
    }

    public function getThumbnail() {
      return $this->thumbnail;
    }

  }

?>

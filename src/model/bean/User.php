<?php

  include "./../controller/attachmentManager/ProfileAttachmentManager.php";

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

    public function __construct($id , $firstName , $lastName , $email , $password , $age , $created_at , $updated_at , $photo , $thumbnail) {
      $this->setId($id);
      $this->setFirstName($firstName);
      $this->setLastName($lastName);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setAge($age);
      $this->setCreated_at();
      $this->setUpdated_at();
      $this->setPhoto($photo);
      $this->thumbnail($thumbnail);

      // Verificar se a photo e thumbnail estao no BDA (funcao clase AttachmentManager)
    }

    public function __construct($firstName , $lastName , $email , $password , $age) {
      $this->setFirstName($firstName);
      $this->setLastName($lastName);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setAge($age);
      $this->setCreated_at();
      $this->setUpdated_at();

      $this->photo = new Attachment(ProfileAttachmentManager::PATH_PROFILE_PHOTO , "default" , "png");
    }
    public function __construct($name, $email, $password){
      $this->setFirstName($name);
      $this->setLastName("");
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setCreated_at();
      $this->setUpdated_at();
      $this->setAge(0);
    }

    public function changePhoto($tmp_photo) {
      $profileAttachmentManager = new ProfileAttachmentManager();
      $this = $profileAttachmentManager->updateProfilePhoto($this, $tmp_photo);
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
        throw new WrongAgeExcepti
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
        throw new Created_atException("Can only be created once");
      }
    }

    private function setCreated_at($date) {
      $this->created_at = $date
    }

    public function getUpdated_At() {
      return $this->updated_at;
    }

    private function setUpdated_at() {
      $this->updated_at = date('Y-m-d H:i:s');
    }

    private function setUpdated_at($date) {
      $this->updated_at = $date;
    }

    public function getPhoto() {
      return $this->photo
    }

    private function setPhoto($photo) {
      $this->photo = $photo;
    }

    public function getThumbnail() {
      return $this->thumbnail;
    }

    private function setThumbnail($thumbnail) {
      $this->thumbnail = $thumbnail;
    }

  }

?>

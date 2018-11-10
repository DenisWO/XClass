<?php
  include_once __DIR__ . "/../../controller/attachmentManager/ProfileAttachmentManager.php";

  class User{

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;   // Nao sei se a senha deve ficar aqui !!!!
    private $birthday;   // Format dd/mm/aaaa Ex: 03/10/1997 -> 03 de outubro de 1997
    private $photo;      // Object Attachment -> Profile Photo
    private $thumbnail;  // Object Attachment -> Low resolution profile photo

    public function __construct($id , $firstName , $lastName , $email , $password , $birthday) {
      $this->setId($id);
      $this->setFirstName($firstName);
      $this->setLastName($lastName);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setBirthday($birthday);
      $this->photo     = ProfileAttachmentManager::getDefaultPhoto();
      $this->thumbnail = ProfileAttachmentManager::getDefaultThumbnail();

      // Verificar se a photo e thumbnail estao no BDA (funcao clase AttachmentManager)
    }

    public function changePhoto($tmp_photo) {
      $profileAttachmentManager = new ProfileAttachmentManager();
      $profileAttachmentManager->updateProfilePhoto($this, $tmp_photo);

      $this->setPhoto($profileAttachmentManager->getPhoto());
      $this->setThumbnail($profileAttachmentManager->getThumbnail());
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
        $this->email= $email;
    }

    public function getPassword() {
      return $this->password;
    }

    public function setPassword($password) {
      $this->password = $password;
    }

    public function getBirthday() {
      return $this->birthday;
    }

    public function setBirthday($birthday) {
      $this->birthday = $birthday;
    }

    public function getPhoto() {
      return $this->photo;
    }

    public function setPhoto($photo) {
      $this->photo = $photo;
    }

    public function getThumbnail() {
      return $this->thumbnail;
    }

    public function setThumbnail($thumbnail) {
      $this->thumbnail = $thumbnail;
    }

    public function getFullName(){
      return $this->firstName . " " . $this->lastName;
    }

  }

?>

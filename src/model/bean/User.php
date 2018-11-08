<?php
  /*Os imports estão dando problema de arquivos não encontrados*/

  //include_once "../../controller/attachmentManager/ProfileAttachmentManager.php";
  //include_once "../../controller/validate/ValidationUser.php";
  //include_once "../../errors/Created_atException.php";

  class User{

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;   // Nao sei se a senha deve ficar aqui !!!!
    private $birthday;   // Format dd/mm/aaaa Ex: 03/10/1997 -> 03 de outubro de 1997
    private $created_at; // Object Timestamp
    private $updated_at; // Object Timestamp
    private $photo;      // Object Attachment -> Profile Photo
    private $thumbnail;  // Object Attachment -> Low resolution profile photo

    public function __construct($id , $firstName , $lastName , $email , $password , $birthday , $created_at , $updated_at , $photo , $thumbnail) {
      $this->setId($id);
      $this->setFirstName($firstName);
      $this->setLastName($lastName);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setBirthday($birthday);
      $this->setCreated_at($created_at);
      $this->setUpdated_at($updated_at);
      $this->setPhoto($photo);
      $this->setThumbnail($thumbnail);

      // Verificar se a photo e thumbnail estao no BDA (funcao clase AttachmentManager)
    }

/*Construtores já criados anteriormente - PHP não permite*/

/*    public function __construct($firstName , $lastName , $email , $password , $age) {
      $this->setFirstName($firstName);
      $this->setLastName($lastName);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setBirthday($age);
      $this->setCreated_at();
      $this->setUpdated_at();

      $this->photo     = ProfileAttachmentManager::getDefaultPhoto();
      $this->thumbnail = ProfileAttachmentManager::getDefaultThumbnail();
    }
    public function __construct($name, $email, $password){
      $this->setFirstName($name);
      $this->setLastName("");
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setCreated_at();
      $this->setUpdated_at();
      $this->setBirthday(0);

      $this->photo     = ProfileAttachmentManager::getDefaultPhoto();
      $this->thumbnail = ProfileAttachmentManager::getDefaultThumbnail();
    }
*/
    //Esta função pode lançar as seguintes exceções:
    //CannotConnectSQLException, SQLException, Created_atException, WrongObjectException, NullException e NotAImageException
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
    /*Problema nos scripts de validação*/
    public function setFirstName($firstName) {
      //if (validateFirstName($firstName)) {
        $this->firstName = $firstName;
      //}
    }

    public function getLastName() {
      return $this->lastName;
    }

    public function setLastName($lastName) {
      //if (validateLastName($lastName)) {
        $this->lastName = $lastName;
      //}
    }

    public function getEmail() {
      return $this->email;
    }

    public function setEmail($email) {
      //if (validateEmail($email)) {
          $this->email= $email;
      //}
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

    public function getCreated_At() {
      return $this->created_at;
    }
    /*Método sobrescrito*/

    /*private function setCreated_at() {
      if (empty($this->created_at)) {
        $this->created_at = date('Y-m-d H:i:s');
      }else{
        throw new Created_atException();
      }
    }*/

    private function setCreated_at($date) {
      $this->created_at = $date;
    }

    public function getUpdated_At() {
      return $this->updated_at;
    }
    /*Método sobrescrito*/

    /*private function setUpdated_at() {
      $this->updated_at = date('Y-m-d H:i:s');
    }*/

    private function setUpdated_at($date) {
      $this->updated_at = $date;
    }

    public function getPhoto() {
      return $this->photo;
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
    public function getName(){
      return $this->firstName . " " . $this->lastName;
    }

  }

?>

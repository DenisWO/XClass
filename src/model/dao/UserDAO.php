<?php

  include_once '../../connection/Connection.php';
  include_once '../bean/User.php';
  include_once '../../errors/WrongObjectException.php';
  include_once '../../errors/SQLException.php';
  include_once '../../errors/EmailAlreadyRegistered.php';
  include_once '../../errors/UnregistredUserException.php';

  class UserDAO{
    private $conector;
    public function __construct($bd) {
      $this->conector = $bd;
    }

    //Save a new User
    public function save($objectUser) {
      if (get_class($objectUser) !== "User") {
        throw new WrongObjectException("User" , get_class($objectUser));
      }
      $sql = "SELECT * FROM user WHERE email = " . $objectUser->email;
      if($conector->query($sql) === NULL){
        $sql = 'INSERT INTO User (first_name , last_name , email, password , birthday , created_at , updated_at , photo_id , thumbnail_id) VALUES (?,?,?,?,?,?,?,?,?)';
        $stmt = $conector->prepare($sql);
        $stmt->bind_param("sssssssii", $objectUser->getFirstName(), $objectUser->getLastName() , $objectUser->getEmail(), $objectUser->getPassword() , $objectUser->getBirthday() , $objectUser->getCreated_at() , $objectUser->getUpdated_at() , $objectUser->getPhoto()->getId() , $objectUser->getThumbnail()->getId() );

        if (!$stmt) {
          throw new SQLException($stmt , $sql);
        }

        $stmt->execute();

        if (!$stmt) {
          throw new SQLException($stmt , $sql);
        }
      }
      else{
        throw new EmailAlreadyRegistered($email);
      }
    }

    //Update an existing user
    public function update($objectUser) {
      if (get_class($objectUser) == "User") {
        throw new WrongObjectException("User" , get_class($objectUser));
      }

      //Refresh updated_at
      $objectUser->setUpdated_at();
      $sql = "UPDATE User SET first_name = ? , last_name = ? , email = ? , password = ? , birthday = ? , created_at = ? , updated_at = ? , photo_id = ? , thumbnail_id = ? WHERE id = ? ";
      $stmt = $conector->prepare($sql);
      $stmt->bind_param("sssssssiii",  $objectUser->getFirstName() , $objectUser->getLastName() , $objectUser->getEmail() , $objectUser->getPassword() , $objectUser->getBirthday() , $objectUser->getCreated_at() , $objectUser->getUpdated_at() , $objectUser->getPhoto()->getId() , $objectUser->getThumbnail()->getId() , $objectUser->getId() );

      if (!$stmt) {
        throw new SQLException($stmt , $sql);
      }

      $stmt->execute();

      if (!$stmt) {
        throw new SQLException($stmt , $sql);
      }

    }

    //Load ALL users
    public function loadAll() {

    }

    //Loads only the id specific user
    public function loadId($id) {
      $sql = "SELECT * FROM user WHERE email = {'$id'}";
      $conect = $conector->query($sql);

      if($dados = $conector->query($sql) === TRUE){

        try {
          //Capture the profile photo in the bda
          $photoDAO = new AttachmentDAO();
          $photo = $photoDAO->loadId($data["photo_id"]);

          //Capture the thumbnail in the bda
          $thumbnailDAO = new AttachmentDAO();
          $thumbnail = $thumbnailDAO->loadId($data["thumbnail_id"]);

          $user = new User($data["id"],
            $data["firstName"],
            $data["lastName"],
            $data["email"],
            $data["password"],
            $data["birthday"],
            $data["created_at"],
            $data["updated_at"],
            $photo,
            $thumbnail
          );
          return $user;
        }catch(SQLException $e) {
          throw $e;
        }
      }else{
        throw new SQLException("Não foi possivel executar a query" , $stmt , $sql);
      }

      throw new UnregistredUserException("Id incorreto" , $id);
    }

    //Loads only the email specific user
    public function loadEmail($email) {
      $sql = "SELECT * FROM user WHERE email = '$email'";
      $conect = $conector->query($sql);

      if($dados = $conector->query($sql) === TRUE){

        try {
          //Capture the profile photo in the bda
          $photoDAO = new AttachmentDAO();
          $photo = $photoDAO->loadId($data["photo_id"]);

          //Capture the thumbnail in the bda
          $thumbnailDAO = new AttachmentDAO();
          $thumbnail = $thumbnailDAO->loadId($data["thumbnail_id"]);

          $user = new User($data["id"],
            $data["firstName"],
            $data["lastName"],
            $data["email"],
            $data["password"],
            $data["birthday"],
            $data["created_at"],
            $data["updated_at"],
            $photo,
            $thumbnail
          );
          return $user;
        }catch(SQLException $e) {
          throw $e;
        }
      }else{
        throw new SQLException($stmt , $sql);
      }

      throw new UnregistredUserException($email);
    }

    //Delete an existing user
    public function delete() {

    }

  }

?>

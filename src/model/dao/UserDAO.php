<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/User.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/EmailAlreadyRegistered.php';
  include_once __DIR__ . '/../../errors/UnregistredUserException.php';

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
      $sql = "SELECT * FROM user WHERE email = " . $objectUser->getEmail();
      if(!$this->conector->query($sql)){
        $params = "('" . $objectUser->getFirstName(). "',  '". $objectUser->getLastName() . "', '" .
        $objectUser->getEmail() ."', '". $objectUser->getPassword() ."', '". $objectUser->getBirthday(). "', '" . "')" ;
        $sql = 'INSERT INTO Users (first_name , last_name , email, password , birthday) VALUES ' . $params;
        echo $sql . "<br>";
        $stmt = $this->conector->prepare($sql);
        if (!$stmt) {
          throw new SQLException($stmt , $sql);
        }

        var_dump($stmt->execute());

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
      $sql = "UPDATE User SET first_name = ? , last_name = ? , email = ? , password = ? , birthday = ? WHERE id = ? ";
      $stmt = $this->conector->prepare($sql);
      $stmt->bind_param("sssssi",  $objectUser->getFirstName() , $objectUser->getLastName() , $objectUser->getEmail() , $objectUser->getPassword() , $objectUser->getBirthday(), $objectUser->getId() );

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
      $conect = $this->conector->query($sql);

      if($dados = $this->conector->query($sql) === TRUE){

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
      $conect = $this->conector->query($sql);

      if($dados = $this->conector->query($sql) === TRUE){

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

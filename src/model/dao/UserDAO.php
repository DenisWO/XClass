<?php
  include './../connection/Connection.php';
  include './../bean/User.php';

  class UserDAO() {
    public function __construct() {
      try {
        connection();
      }catch(CannotConnectSQLException $e) {
        throw $e;
      }
    }

    //Save a new User
    public function save($objectUser) {
      if (get_class($objectUser) == "User") {
        throw new WrongObjectException("Wrong object" , "User" , get_class($objectUser));
      }

      $sql = "SELECT * FROM user WHERE email = '$objectUser->email'";
      if($conector->query($sql) === NULL){
        $sql = 'INSERT INTO User (first_name , last_name , email, password , age , created_at , updated_at , photo_id , thumbnail) VALUES (?,?,?,?,?,?,?,?,?)';
        $stmt = $conector->prepare($sql);



        $stmt->bind_param("ssssissii", $objectUser->getFirstName(), $objectUser->getLastName() , $objectUser->getEmail(), $objectUser->getPassword() , $objectUser->getAge() , $objectUser->getCreated_at() , $objectUser->getUpdated_at() , $objectUser->getPhoto()->getId() , $objectUser->getThumbnail()->getId() );

        if (!$stmt) {
          throw new SQLException("Não foi possivel processar a query" , $stmt , $sql);
        }

        $stmt->execute();

        if (!$stmt) {
          throw new SQLException("Não foi possivel executar a query" , $stmt , $sql);
        }
      }
      else{
        throw new EmailAlreadyRegistered("Esse email já está cadastrado por um usuário!" , $email);
      }
    }

    //Update an existing user
    public function update($objectUser) {
      if (get_class($objectUser) == "User") {
        throw new WrongObjectException("Wrong object" , "User" , get_class($objectUser));
      }

    }

    //Load ALL users
    public function loadAll() {

    }

    //Loads only the id specific user
    public function loadId($id) {

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
            $data["age"],
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

      throw new UnregistredUserException("Email incorreto" , $email);
    }

    //Delete an existing user
    public function delete() {

    }
  }

?>

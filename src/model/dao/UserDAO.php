<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/User.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/EmailAlreadyRegistered.php';
  include_once __DIR__ . '/../../errors/UnregistredUserException.php';

  class UserDAO{
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new User
    public function save($objectUser) {
      $photo = $objectUser->getPhoto();
      $thumbnail = $objectUser->getThumbnail();

      $sql = "INSERT INTO users (first_name,last_name,email,password,birthday,photo_id,thumbnail) VALUES ( $objectUser->getFirstName() , $objectUser->getLastName() , $objectUser->getEmail() , $objectUser->getPassword() , $objectUser->getBirthday() , $photo->getId() ,$thumbnail->getId())";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

    //Update an existing user
    public function update($objectUser) {

    }

    //Load ALL users
    public function loadAll() {
      $users = array();
      $sql = "SELECT * FROM users";
      $stmt = $this->conn->query($sql);

      $nlinhas = $stmt->num_rows;

    	if($nlinhas > 0){
    		$users = array();

    		while($linha = mysqli_fetch_array($stmt)){
    			extract($linha);

          "photo_id" => $photo_id;
          "thumbnail_id" => $thumbnail_id;

          $photo = getAttachmentById($photo_id);
          $thumbnail = getAttachmentById($thumbnail_id);

    			$cliEncontrado = array(
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "password" => $password,
            "birthday" => $birthday,
            "photo_id" => $photo,
            "thumbnail" => $thumbnail
    			);
    			array_push($users, $cliEncontrado);
    		}
    	}

      return $users;
    }

    //Loads only the id specific user
    public function loadId($id) {

      $sql = "SELECT * FROM user WHERE id = $id";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $user = new User(
          $dados["id"],
          $dados["firstName"],
          $dados["lastName"],
          $dados["email"],
          $dados["password"],
          $dados["birthday"]
        );

        return $user;
    	}

      return FALSE;
    }

    //Loads only the email specific user
    public function loadEmail($email) {
      $sql = "SELECT * FROM user WHERE email = $email";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $user = new User(
          $data["id"],
          $data["firstName"],
          $data["lastName"],
          $data["email"],
          $data["password"],
          $data["birthday"]
        );

        return $user;
    	}

      return FALSE;
    }

    //Delete an existing user
    public function delete($objectUser) {
      $sql = "DELETE FROM users WHERE id = $objectUser->id";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

  }

?>

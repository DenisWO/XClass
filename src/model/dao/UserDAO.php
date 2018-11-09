<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/User.php';

  class UserDAO{
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new User
    public function save($objectUser) {
      $photo = $objectUser->getPhoto();
      $thumbnail = $objectUser->getThumbnail();
      $params = "('".$objectUser->getFirstName(). "', '" . $objectUser->getLastName(). "', '" . $objectUser->getEmail(). "', '" . $objectUser->getPassword(). "', '" . $objectUser->getBirthday(). "', " . $photo->getId(). "," .$thumbnail->getId() . ")";
      $sql = 'INSERT INTO users (first_name,last_name,email,password,birthday,photo_id,thumbnail_id) VALUES ' . $params;
      echo $sql;
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
      $sql = "SELECT * FROM users";
      $stmt = $this->conn->query($sql);

      $users = array();

      while($dados = $stmt->fetch_array()){
        var_dump($dados);
        $user = new User(
          $dados["id"],
          $dados["first_name"],
          $dados["last_name"],
          $dados["email"],
          $dados["password"],
          $dados["birthday"]
        );

        array_push($users , $user);
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

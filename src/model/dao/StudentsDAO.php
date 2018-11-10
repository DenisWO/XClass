<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/User.php';
  include_once __DIR__ . '/../bean/Xclass.php';
  include_once __DIR__ . '/UserDAO.php';
  include_once __DIR__ . '/XClassDAO.php';

  class UserDAO{
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    public function saveStudents($objectXClass) {
      
    }

    public function loadUsersByClass($classId) {
      /*
        Passa um id de XClass e retorna todos os users pertencentes a aquele XClass
      */

      $sql = "SELECT * FROM students WHERE class_id = {$classId}";
      $stmt = $this->conn->query($sql);

      $users = array();

      while($dados = $stmt->fetch_array()){
        $user_id = $dados["user_id"];
        $dao = new UserDAO();
        $user = $dao->loadById($user_id);

        array_push($users , $user);
    	}
      return $users;
    }

    public function loadClassByUser($userId) {
      /*
        Passa um id de usuario e retorna todas as XClasses pertencentes a aquele
        usuario, as classes retornadas tem o array de estudantes e atividades vazia,
        isso para otimizar o carregamento das classes
      */

      $sql = "SELECT * FROM students WHERE user_id = {$userId}";
      $stmt = $this->conn->query($sql);

      $XClasses = array();

      while($dados = $stmt->fetch_array()){
        $class_id = $dados["class_id"];
        $dao = new ClassDAO();
        $class = $dao->loadById($class_id);

        array_push($XClasses , $class);
    	}
      return $XClasses;
    }

  }

?>

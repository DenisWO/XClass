<?php
  include '../model/bean/User.php';
  include 'Connection.php';


  private $user = new User();

  public function createAccount(){
    $user->firstName = $_POST['firstName'];
    $user->lastName = $_POST['lastName'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->age = $_POST['age'];

    $sql = 'INSERT INTO User (first_name, last_name, email, password, age) VALUES (?,?,?,?,?)';

    $conect = $conector->prepare($sql);
    $conect->bind_param("ssssi", $user->firstName, $user->lastName, $user->email, $user->password, $user->age);
    $conect->execute();

    echo "Registros inseridos" . $conect->affected_rows;
  }
  public function login(){
    session_start();
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    $sql = "SELECT * FROM User WHERE email = '$user->email' AND password = '$user->password'";
    $conect = $conector->query($sql);
    while($data = $conect->fetch_array()){
      $_SESSION = $data["id"];
    }
    echo "Login realizado com sucesso!";
  }
?>

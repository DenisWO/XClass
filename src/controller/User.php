<?php
  include '../model/bean/User.php';
  include '../model/dao/UserDAO.php';

  private $user = new User();

  public function createAccount(){
    $user = new User(
      $_POST['firstName'],
      $_POST['lastName'],
      $_POST['email'],
      $_POST['password'],
      $_POST['age']
    );

    $dao = new UserDAO();
    $retorno = $dao->save($user);
    echo $retorno;
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

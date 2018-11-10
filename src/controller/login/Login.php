<?php
  include_once __DIR__ . '/ValidateLogin.php';

  session_start();

  $user = validateLogin($_POST['email'] , $_POST['password']);

  if ($user) {
    echo "Login realizado com sucesso! <br>";
    echo "Seja bem vindo {$user->getFullName()}";
  }else{
    echo "Dados incorretos!";
  }

?>

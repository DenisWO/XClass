<?php
  include_once __DIR__ . '/ValidateLogin.php';

  session_start();

  $user = validateLogin($_POST['email'] , $_POST['password']);

  if ($user) {
    echo "Login realizado com sucesso! <br>";
    echo "Seja bem vindo {$user->getFullName()}";
    $_SESSION['id'] = $user->getId();
    $_SESSION['login'] = $user->getEmail();
    $_SESSION['name'] = $user->getFullName();
    $_SESSION['senha'] = $user->getPassword();
    header('Location: ../../view/pagprincipal/pagprincipal.php?notSession');
  }else{
    unset($_SESSION);
    header('Location:../../view/login/index.php?erro=2');
  }

?>

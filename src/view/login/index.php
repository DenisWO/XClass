<?php

  if (isset($_GET['notSession'])) {
    echo "<script src='./../../resources/js/jquery-3.3.1.js' type='text/javascript'></script>";
    echo "<script src='./../../resources/js/notify.min.js' type='text/javascript'></script>";
    echo "<script src='./../../resources/js/notify.js' type='text/javascript'></script>";
    echo '<body><script type="text/javascript">$.notify("Voce precisa iniciar sessão!", "error");</script></body>';
  }
  if($_GET['erro'] == 2){
      echo "<script>window.alert('Erro de login! Tente novamente!')</script>";
  }

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../resources/image/xclass.png">

    <title>Login XClass</title>

    <!-- Bootstrap core CSS -->
    <link href="../../resources/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../resources/css/bootstrap/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="../../controller/login/Login.php" method="POST">
      <img class="mb-4" src="../../resources/image/xclass.png" alt="" width="300" height="150">
      <h1 class="h3 mb-3 font-weight-normal">Faça Seu Login</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Endereço de E-mail" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar
        </label>
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
      <div id="cad">
        <a id="fazerCadastro" href="../cadastro/index.html">Faça Seu Cadastro</a>
      </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>

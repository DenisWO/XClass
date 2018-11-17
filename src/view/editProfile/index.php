<?php
  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  echo "<script src='./../../resources/js/jquery-3.3.1.js' type='text/javascript'></script>";
  echo "<script src='./../../resources/js/notify.min.js' type='text/javascript'></script>";
  echo "<script src='./../../resources/js/notify.js' type='text/javascript'></script>";

  session_start();
  //Configs default
  $user = new User("" , "" , "" , "" , "" , "");
  $backToRoot = "../../";

  if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $dao = new UserDAO();
    $user = $dao->loadId($user_id);
  }else{
    header("Location:./../login/index.php?notSession");
  }

  //Caso alterar os dados do perfil
  if (isset($_GET['changeData'])) {
    include __DIR__ . '/../../controller/user/UpdateUser.php';
  }

  //Caso alterar a foto de perfil
  if (isset($_GET['changePhoto'])) {
    include __DIR__ . '/../../controller/user/UpdateProfilePhoto.php';
  }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../resources/image/xclass.png">
    <link href="../../resources/css/editProfile/fileStyle.css" rel="stylesheet">

    <title>Cadastrar</title>

    <!-- Bootstrap core CSS -->
    <link href="../../resources/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../resources/css/bootstrap/form-validation.css" rel="stylesheet">

    <script src='./../../resources/js/jquery-3.3.1.js' type='text/javascript'></script>
    <script src='./../../resources/js/notify.min.js' type='text/javascript'></script>
    <script src='./../../resources/js/notify.js' type='text/javascript'></script>

    <!--Arquivo Ajax-->
    <script>
       $(document).ready(function() {
        $('#submitBtn').click(function(){
          var dataString = $('#ajax_form').serialize();

          $.ajax({
            type:"post",
            url:"./../../controller/user/UpdateUser.php",
            data: dataString,
            success: function(data){

            $("#result").text(data);
            if(data=="Cadastro realizado com sucesso!!"){
              $.notify("Atualizado com sucesso!", "success");
            }
         }
         });
         event.preventDefault();
        });
       });
    </script>

  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../resources/image/xclass.png" alt="" width="300" height="150">
        <h2>Perfil do Usuário</h2>
      </div>

      <form method="POST" id="ajax_form2" action="index.php?changePhoto" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user->getId()?>" />
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Imagem de Perfil:</h4>
          <img src="<?php $photo = $user->getPhoto(); echo $backToRoot . $photo->getAddress(); ?>" height="200" width="200"/>
          <label class='fileStyle' for='selecao-arquivo'>Selecionar &#187;</label>
          <input id='selecao-arquivo' type='file' name='photo'>
          <input class="fileStyle" type="submit" value="Salvar">
        </div>
      </form>

      <div class="row">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Dados Cadastrais</h4>
          <form class="needs-validation" method="POST" id="ajax_form" action="index.php?changeData">
            <div class="row">
              <input type="hidden" name="id" value="<?php echo $user->getId()?>" />
              <div class="col-md-6 mb-3">
                <label for="firstName">Nome</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="<?php echo $user->getFirstName() ?>" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Sobrenome</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="<?php echo $user->getLastName() ?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">E-mail <span class="text-muted"></span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="ex@gmail.com" value="<?php echo $user->getEmail() ?>">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="password">Senha</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Senha" value="<?php echo $user->getPassword() ?>" required>
              <div class="invalid-feedback">
                Digite sua senha.
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="birthday">Data de Nascimento</label>
                    <div class="mb-3">
                        <input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo $user->getBirthday() ?>">
                    </div>
              </div>
            </div>

            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Salvar modificações" name="submit" id="submitBtn">
          </form>

        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 XClass</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacidade</a></li>
          <li class="list-inline-item"><a href="#">Termos</a></li>
          <li class="list-inline-item"><a href="#">Suporte</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>

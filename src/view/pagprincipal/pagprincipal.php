<!DOCTYPE html>
<?php
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header('location: ../login/index.html');
      }
      $logado = $_SESSION['login'];
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Classes</title>
    <link rel="stylesheet" href="../../resources/css/pagprincipal.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include_once __DIR__ . "/../cabecalho/cabecalho.php";
        include __DIR__ . '/../../controller/XClass/SearchClasses.php';
        include_once __DIR__ . '/../../model/bean/User.php';

        foreach ($class as $value) {
          $teacher = $value->getTeacher();
            echo '<div class="container">
                <div id="turma">
                    <div id="disProf">
                        <div class="text-dark" id="nomeDisciplina">
                            <h3>'. $value->getName().'</h3>
                        </div>
                        <div class="text-dark text-small" id="nomeProf">
                            <h5>'. $teacher->getFullName() .'</h5>
                        </div>
                    </div>
                    <div id="imagemPerfil">
                        <img src="../../resources/image/xclass.png" width="80" heidth="80">
                    </div>
                    <div id="button">
                      <button id="button" name="button" onclick="GoToPage()">Entrar</button>
                    </div>
                </div>
            </div>';
        }
    ?>
</body>
</html>

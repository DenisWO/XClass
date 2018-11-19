<!DOCTYPE html>
<?php
    session_start();
    if (isset($_GET['erro'])) {
      if($_GET['erro'] == 2){
        echo "<script> window.alert('Classe criada com sucesso!')</script>";
      }  
    }
    
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header('location: ../login/index.php?notSession');
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
        include __DIR__ . "/../cabecalho/cabecalho.php";
        include __DIR__ . "/../../controller/pagprincipal/mostraTurmas.php";
    ?>
</body>
</html>

<?php

    include_once '../cabecalho/cabecalho.php';

    echo "<script src='./../../resources/js/jquery-3.3.1.js' type='text/javascript'></script>";
    echo "<script src='./../../resources/js/notify.min.js' type='text/javascript'></script>";
    echo "<script src='./../../resources/js/notify.js' type='text/javascript'></script>";

    session_start();
    if($_GET['erro'] == 1){
        echo '<body><script type="text/javascript">$.notify("Tumra não encontrada!", "info");</script></body>';
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
        
        <title>Participar de Turma</title>

        <link rel="icon" href="../../resources/image/xclass.png">
        <link href="../../resources/css/participarTurma.css" rel="stylesheet">
        <meta charset="utf-8" />
    </head>
    <body>
        <form action="../../controller/XClass/EnterOnNewClass.php" method="post" id="formularioParticiparTurma">
            <label>Entre com o codigo da turma: </label>
            <input type="text" name="codigoTurma"/>
            <input type="submit" value="Participar" />
        </form>
    </body>
</html>

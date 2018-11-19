<?php
    if($_GET['erro'] == 1){
        echo "<script>window.alert('Turma não encontrada!')</script>";
    }
?>
<html>
    <head>
        <title>Participar de uma turma</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <form action="../../controller/XClass/EnterOnNewClass.php" method="post">
            <label>Entre com o codigo da turma: </label>
            <input type="text" name="codigoTurma"/>
            <input type="submit" value="Participar" /><br>
			<a href="../pagprincipal/index.php?erro=0">Voltar</a>
        </form>
    </body>
</html>

<!doctype "html">
<html lang = "pt-br">
  <head>
    <meta charset="utf-8"/>
  </head>
  <body>
    <div>
      <form action="./editProfile.php" method="post" name="selecionar" >
        <h1>Selecione o usuario que deseja modificar</h1>

        <div>
          <select><?php include __DIR__ . "/selectUsers.php"; ?></select>
        </div>

        <div>
          <br><input type="submit" name="selecionar" value="Selecionar" />
        </div>

        <div><br><br><a href="../../index.php">Voltar Menu</a></div>
      </form>
    </div>

  </body>
</html>

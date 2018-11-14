<?php
  //Resgatar usuario do select

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  $user_id = $_POST['usuario'];
  $dao = new UserDAO();
  $user = $dao->loadId($user_id);

  $backToRoot = "../../";

?>

<!doctype "html">
<html lang = "pt-br">
  <head>
    <meta charset="utf-8"/>
  </head>
  <body>
    <div>
      <form action="" method="post" name="cadastro" >
        <h1>Meu perfil</h1>

        <div>
          <br><label>Primeiro Nome:</label>
          <input type="text" name="first_name" value="<?php echo $user->getFirstName() ?>"/>
          <br><label>Ultimo Nome:</label>
          <input type="text" name="last_name" value="<?php echo $user->getLastName() ?>"/>
          <br><label>Email:</label>
          <input type="text" name="email" value="<?php echo $user->getEmail() ?>"/>
          <br><label>Senha:</label>
          <input type="text" name="password" value="<?php echo $user->getPassword() ?>"/>
          <br><label>Data nascimento:</label>
          <input type="text" name="birthday" value="<?php echo $user->getBirthday() ?>"/>
        </div>

        <div>
          <br><label>Imagem de Perfil:</label><br><br>
          <img src="<?php $photo = $user->getPhoto(); echo $backToRoot . $photo->getAddress(); ?>"/>
        </div>

        <div>
          <br><label>Thumbnail:</label><br><br>
          <img src="<?php $thumbnail = $user->getThumbnail(); echo $backToRoot . $thumbnail->getAddress(); ?>"/>
        </div>

        <div>
          <br><input type="submit" name="salvar" value="Salvar" />
        </div>

        <div><br><br><a href="../../index.php">Voltar Menu</a></div>
      </form>
    </div>

  </body>
</html>

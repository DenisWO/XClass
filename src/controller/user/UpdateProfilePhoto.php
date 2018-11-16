<?php

  include_once __DIR__ . '/../../model/bean/User.php';
  include_once __DIR__ . '/../../model/dao/UserDAO.php';

  $id = $_POST['id'];
  $dao = new UserDAO();
  $user = $dao->loadId($id);

  $tmp_photo = $_FILES['photo'];
  if (empty($tmp_photo['name'])) {
    echo '<body><script type="text/javascript">$.notify("Você precisa selecionar uma foto!", "error");</script></body>';
  }else{

    $user->changePhoto($tmp_photo);
    $result = $dao->save($user);

    if ($result) {
      echo '<body><script type="text/javascript">$.notify("A foto de perfil foi alterado!", "success");</script></body>';
    }else{
      echo '<body><script type="text/javascript">$.notify("Ocorreu um erro ao atualizar!", "error");</script></body>';
    }

  }

?>

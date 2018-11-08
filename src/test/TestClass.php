<?php
  include_once '../model/bean/XClass.php';
  include_once '../model/dao/XClassDAO.php';
  include_once '../connection/Connection.php';
  include 'TestUser.php';

  $bancoDeDados = new Connection();
  $bd = $bancoDeDados->getConnection();

  $id = 1;
  $name = "Programacao Orientada à Gambiarra";
  $instituiton = "UIT";
  $teacher = $user;
  $created_at = "2018-01-01";
  $updated_at = "2018-01-01";

  $class = new XClass($id, $name, $instituiton, $teacher, $updated_at, $created_at);

  echo "Printando dados: <br />";
  echo $class->getId() . " <br />";
  echo $class->getName() . " <br />";
  echo $class->getInstituiton() . " <br />";
  echo $class->getTeacher()->getName() . " <br />";
  echo $class->getCreated_At() . " <br />";
  echo $class->getUpdated_At() . " <br />";

  $dao = new XClassDAO($bd);
  $dao->save($class);
?>

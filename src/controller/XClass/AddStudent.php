<?php
  include_once __DIR__ . '/../model/bean/XClass.php';
  include_once __DIR__ . '/../model/dao/XClassDAO.php';
  include_once __DIR__ . '/../model/bean/User.php';

  function addStudent($class, $student){

    $dao = new XClassDAO();
    $dao->saveStudent($class, $student);

    if (!$dao) {
      echo "Erro ao tentar salvar estudante!";
    }

    $class->addStudent($student);
    echo "Aluno adicionado à turma com sucesso!";

  }

?>

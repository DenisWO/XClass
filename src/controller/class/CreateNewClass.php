<?php
  include_once __DIR__ . '/../model/bean/XClass.php';
  include_once __DIR__ . '/../model/dao/XClassDAO.php';

  function createNewClass($class){
    $dao = new XClassDAO();
    $dao->save($class);

    if (!$dao) {
      echo "Erro ao tentar salvar classe!";
    }

    echo "Classe criada com sucesso!";
  }


?>

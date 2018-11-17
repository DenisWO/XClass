<?php

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

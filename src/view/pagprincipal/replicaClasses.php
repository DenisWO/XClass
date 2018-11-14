<?php

    include_once __DIR__ . '/../../model/bean/XClass.php';
    include_once __DIR__ . '/../../model/dao/XClassDAO.php';

    $dao = new XClassDAO();
    $classes = $dao->loadAll();

    // fazer foreach ($variable as $key => $value) {
        //echo "<turmas></turmas>";

?>

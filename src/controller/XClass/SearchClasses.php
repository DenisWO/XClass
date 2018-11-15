<?php
    include __DIR__ . '/../../model/bean/XClass.php';
    include __DIR__ . '/../../model/dao/XClassDAO.php';
    include __DIR__ . '/../../model/dao/StudentsDAO.php';

    if(!isset($_SESSION['login'])){
        echo "Deu erro aqui caraio!";
        return;
    }
    $_SESSION['id'] = 1;

    $daoClass = new XClassDAO();
    $class = $daoClass->loadTeacher($_SESSION['id']);
    $daoStudents = new StudentsDAO();
    $stds = $daoStudents->loadClassByUser($_SESSION['id']);
    $t = $class[0];
    var_dump($class[0]);
?>

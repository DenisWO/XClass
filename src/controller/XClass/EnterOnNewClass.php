<?php
    include_once __DIR__ . '/../../model/bean/XClass.php';
    include_once __DIR__ . '/../../model/dao/XClassDAO.php';
    include_once __DIR__ . '/../../model/bean/User.php';
    include_once __DIR__ . '/../../model/dao/UserDAO.php';
    include_once __DIR__ . '/../../model/dao/StudentsDAO.php';

    session_start();
    $classdao = new XClassDAO();
    $class = $classdao->loadCode($_POST['codigoTurma']);
    $studentdao = new StudentsDAO();
    $userdao = new UserDAO();
    $user = $userdao->loadId($_SESSION['id']);

    if(!$class){
        header('location: ../../view/participation/index.php?erro=1?notSession');
    }else{
        $studentdao->save($class, $user);
        header("Location: ../../view/pagprincipal/index.php?erro=1?notSession");
    }


?>

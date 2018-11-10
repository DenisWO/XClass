<?php
    include_once __DIR__ . '/../model/dao/StudentsDAO.php';
    include 'TestUser.php';
    include 'TestClass.php';

    $class->setStudent($user2);
    $dao = new StudentsDAO();
    $students = $dao->loadUsersByClass($class->getId());
    $st = $students[0];
    echo $st->getFirstName();
    $students = $dao->loadClassByUser($user2->getId());
    $st = $students[0];



?>

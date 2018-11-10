<?php
    include_once __DIR__ . '/../model/dao/StudentsDAO.php';
    include 'TestUser.php';
    include 'TestClass.php';

    $class->setStudent($user2);
    $studentdao = new StudentsDAO();

?>

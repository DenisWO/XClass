<?php
  include_once __DIR__ . '/../model/bean/XClass.php';
  include_once __DIR__ . '/../model/dao/XClassDAO.php';
  include 'TestUser.php';
  include_once __DIR__ . '/../model/bean/User.php';


  $id = 1;
  $name = "Programacao Orientada a Gambiarra";
  $institution = "UIT";
  $teacher = $user1;
  $year = "2018";
  $semester = "2";

  $class = new XClass($id, $name, $institution, $teacher, $year, $semester);

  /*echo "Printando dados: <br />";
  echo $class->getId() . " <br />";
  echo $class->getName() . " <br />";
  echo $class->getInstitution() . " <br />";
  $teacher = $class->getTeacher();
  echo $teacher->getId() . "<br>";
  echo $class->getYear() . "<br>";
  echo $class->getSemester() . "<br>";*/

  $classdao = new XClassDAO();

?>

<?php
    include_once __DIR__ . '/../model/bean/Activity.php';
    include_once __DIR__ . '/../model/dao/ActivityDAO.php';
    include 'TestStudents.php';

    $activity = new Activity(1, 'Hello World', 'Fazer um hello world em php', '20181101');
    /*echo "{$activity->getId()} <br />";
    echo "{$activity->getName()} <br />";
    echo "{$activity->getDescription()} <br />";
    echo "{$activity->getDateDelivery()} <br />";*/

    $activitydao = new ActivityDAO();
    $acts = $activitydao->loadId(1);
    echo $acts->getName();

 ?>

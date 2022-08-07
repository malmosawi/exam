<?php
    @session_start();
    //print_r($_SESSION);
    $qur="update trainer set view='3' where trainer_id='".$_SESSION['TRAINER_ID']."'and (view<=3 or view is null or view=0)";
    require("../../../connect.php");
    $result=mysqli_query($link,$qur);


 ?>

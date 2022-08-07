<?php
    @session_start();
    $qur="update trainer set view='7' where trainer_id='".$_SESSION['TRAINER_ID']."' and (view<=7 or view is null or view=0)";
    require("../../../connect.php");
    $result=mysqli_query($link,$qur);



 ?>

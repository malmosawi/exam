<?php
    @session_start();
    $qur="update trainer set view='12' where trainer_id='".$_SESSION['TRAINER_ID']."' and (view<=12 or view is null or view=0)";
    require("../../../connect.php");
    $result=mysqli_query($link,$qur);



 ?>

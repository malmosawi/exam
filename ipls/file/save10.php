<?php
    @session_start();
    $qur="update trainer set view='11' where trainer_id='".$_SESSION['TRAINER_ID']."' and (view<=11 or view is null or view=0)";
    require("../../../connect.php");
    $result=mysqli_query($link,$qur);



 ?>

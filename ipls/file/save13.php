<?php
    @session_start();
    $qur="update trainer set view='0' where trainer_id='".$_SESSION['TRAINER_ID']."' and '".$_SESSION['score']."'>=18 ";
    require("../../../connect.php");
    
    $result=mysqli_query($link,$qur);



 ?>

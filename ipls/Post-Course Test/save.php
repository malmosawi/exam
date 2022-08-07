<?php 


var_dump($_POST);
// session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'rootroot');
define('DB_NAME', 'exam');
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)or die("Error Connect with server");
mysqli_query($link, "set character_set_server='utf8'");
mysqli_query($link, "set names 'utf8'");
// $_SESSION['trainer_id'] = $_SESSION['TRAINER_ID'];
// $sid = session_id();
// $trainer_id = $_SESSION['trainer_id'];
// if(isset($_POST['score'])){
// 	$_SESSION['score'] = $_POST['score'];

// }

// $sql = " SELECT * FROM `exam_result` WHERE `token` = '{$sid}' ";
// $query = mysqli_query($link, $sql);
// $count = mysqli_num_rows($query);
// if($count == 0){
// 	$sql2   = " INSERT INTO `exam_result` (`trainer_id`, `token`)VALUES('$trainer_id', '$sid') ";
// 	mysqli_query($link, $sql2);
// }

$score       = $_POST['score'];
$degree      = $_POST['qdegree'];
$qustion_num = $_POST['qnumber'];
$user = $_POST['user'];
// $sql3         = " INSERT INTO `qustion_result`(`qustion_num`, `degree`, `trainer_id`, `token`)VALUES('$qustion_num', '$degree', '$trainer_id', '$sid') ";
// $q = mysqli_query($link, $sql3);

// if ($qustion_num >= 22) {
// 	$sql4         = " INSERT INTO `certificate` (`degree`, `trainer_id`)VALUES('$score', '$trainer_id') ";
// 	$q = mysqli_query($link, $sql4);


	$sql5         = " UPDATE `student_exam` SET stage=13, step=$qustion_num, degree= $degree WHERE `user_id` =   $user ";	
	$q1 = mysqli_query($link, $sql5);
// }
?>
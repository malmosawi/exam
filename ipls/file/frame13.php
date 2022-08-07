<!DOCTYPE html>
<html lang="en">
<head>

 </head>
<body >


<div dir="rtl">
Welcome : <b><?php @session_start(); echo @$_SESSION['TRAINER_NAME']; ?> <a href="../../../logout.php">After the answer to question 22, please make sure to go to the hall monitor</a></b>
<br />
</div>
<br />

  <iframe style="width: 100%;height: 650px;" src="../Post-Course Test/index.php"></iframe>      
<div class="seremp"></div>
</body>
</html>
<script src="jquery-1.11.3.min.js">   </script>
<script>  
	$('#clos').on('click', function () {
                var postD = $('#clos').val();
               // alert(postDataemp);
				$.post("save13.php", {wheresub:postD}, function (data) { $('.seremp').html(data);
                window.location = '../resus4kidsMenu_fromCdrive.php';
				});
            });	
</script>

<!DOCTYPE html>
<html lang="en">
<head>

 </head>
<body >


<div dir="rtl">
<a id="clos"  href="#"  style="font-size:30px;padding:5px;width: 100px;height: 100px;background-color: red;text-align:center;direction:rtl">X</a>
<br />
</div>
<br />

  <iframe style="width: 100%;height: 650px;" src="../The Choking Child/index.html"></iframe>      
<div class="seremp"></div>
</body>
</html>
<script src="jquery-1.11.3.min.js">   </script>
<script>  
	$('#clos').on('click', function () {
                var postD = $('#clos').val();
               // alert(postDataemp);
				$.post("save12.php", {wheresub:postD}, function (data) { $('.seremp').html(data);
                window.location = '../resus4kidsMenu_fromCdrive.php';
				});
            });	
</script>

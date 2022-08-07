<!DOCTYPE html>
<html lang="en">
<head>

 </head>
<body >

<div dir="rtl">
<a id="clos"  href="#"  style="font-size:30px;padding:5px;width: 100px;height: 100px;background-color: red;text-align:center;direction:rtl">X</a>
<br />
</div>
<iframe style="width: 100%;height: 650px;" src="..\Introduction\index.html"></iframe>
<div class="seremp"></div>
</body>
</html>
<script src="jquery-1.11.3.min.js">   </script>
<script>
//$(document).ready(function(){
	$('#clos').on('click', function () {
                  var postD = 1;
               // alert('ali');
				$.post("save1.php", {wheresub:postD}, function (data) { $('.seremp').html(data);
                window.location = '../resus4kidsMenu_fromCdrive.php';
				});
            });
        //});
</script>

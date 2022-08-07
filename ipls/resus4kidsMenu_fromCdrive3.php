<?php session_start(); ?>


<style>
.h{
display:none;
}
</style>
	<div>

<img src="banner2.jpg" style="max-width:600px" /></br>

Welcome : <b><?php echo $_SESSION['TRAINER_NAME']; ?></b> -
<button><a href="../../logout.php">Logout</a>
</button>
<br/>
<p><b>
International Paediatric Life Support E-Learning
</p></b>
<p id="he">Click to select a module from the menu below.</p>
<h1 style="display:none"> The Exam is End </h1>
<ol>
            <li><a id="a1" target="_self" href="Introduction\index.html">Introduction</a></li>
			<li><a id="a2" class="h" target="_self" href="Pre-Course Test\index.html">Pre-Course Test</a></li>
			<li><a id="a3" class="h" target="_self" href="Danger\index.html">Danger</a></li>
			<li><a id="a4" class="h" target="_self" href="Response\index.html">Response</a></li>
			<li><a id="a5" class="h" target="_self" href="Send for Help\index.html">Send for Help</a></li>
			<li><a id="a6" class="h" target="_self" href="Airway\index.html">Airway</a></li>
			<li><a id="a7" class="h" target="_self" href="Breathing\index.html">Breathing</a></li>
			<li><a id="a8" class="h" target="_self" href="Chest Compressions\index.html">Chest Compressions</a></li>
			<li><a id="a9" class="h" target="_self" href="Defibrillation\index.html">Defibrillation</a></li>
			<li><a id="a10" class="h" target="_self" href="Shockable Rhythms\index.html">Shockable Rhythms</a></li>
			<li><a id="a11" class="h" target="_self" href="Non-shockable Rhythms\index.html">Non-shockable Rhythms</a></li>
			<li><a id="a12" class="h" target="_self" href="The Choking Child\index.html">The Choking Child</a></li>
			<li><a id="a13" class="h" target="_self" href="Post-Course Test\index.php">Post-Course Test</a></li>
            
</ol>
				

		
	</div>
	<script src="jquery-1.11.3.min.js">   </script>
	<script>  
			$("#a1").click(function(){
				$("#a2").show(1000);
			});
			$("#a2").click(function(){
				$("#a3").show(1000);
			});
						$("#a3").click(function(){
				$("#a4").show(1000);
			});
						$("#a4").click(function(){
				$("#a5").show(1000);
			});
						$("#a5").click(function(){
				$("#a6").show(1000);
			});
						$("#a6").click(function(){
				$("#a7").show(1000);
			});
						$("#a7").click(function(){
				$("#a8").show(1000);
			});
						$("#a8").click(function(){
				$("#a9").show(1000);
			});
						$("#a9").click(function(){
				$("#a10").show(1000);
			});
						$("#a10").click(function(){
				$("#a11").show(1000);
			});
						$("#a11").click(function(){
				$("#a12").show(1000);
			});
									$("#a12").click(function(){
				$("#a13").show(1000);
			});
            $("#a13").click(function(){
                            $("a").hide(1000);
                             $("#he").hide(1000);
                            $("h1").show(1000);
                            $('li a').show(3000);
                            });
                            
                            

	</script>

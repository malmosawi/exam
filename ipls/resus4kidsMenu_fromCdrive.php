<?php @session_start(); ?>


<style>
.h{
display:none;
}
</style>
	<div>

<img src="banner2.jpg" style="max-width:600px" /></br>

Welcome : <b><?php echo @$_SESSION['TRAINER_NAME']; ?></b> -
<a href="../../logout.php">Logout</a>

<br/>
<p><b>
International Paediatric Life Support E-Learning
</p></b>
<p id="he">Click to select a module from the menu below.</p>
<h1 style="display:none"> The Exam is End </h1>

<div >
<ol>
<?php  

 $qur="select * from trainer where trainer_id='".$_SESSION['TRAINER_ID']."'";
    require("../../connect.php");
    $e=mysqli_query($link, $qur);
            while ($res=mysqli_fetch_assoc($e)) {
              $names3[$res["trainer_id"]]=$res;
              $view=$res['view'];
            }
            
?>
            <li><a id="a1"  href="file\frame1.php">Introduction</a></li>
			<li><a id="a2" <?php if($view>='2'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame2.php">Pre-Course Test</a></li>
			<li><a id="a3" <?php if($view>='3'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame3.php">Danger</a></li>
			<li><a id="a4" <?php if($view>='4'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame4.php">Response</a></li>
			<li><a id="a5" <?php if($view>='5'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame5.php">Send for Help</a></li>
			<li><a id="a6" <?php if($view>='6'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame6.php">Airway</a></li>
			<li><a id="a7" <?php if($view>='7'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame7.php">Breathing</a></li>
			<li><a id="a8" <?php if($view>='8'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame8.php">Chest Compressions</a></li>
			<li><a id="a9" <?php if($view>='9'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h"  href="file\frame9.php">Defibrillation</a></li>
			<li><a id="a10" <?php if($view>='10'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h" href="file\frame10.php">Shockable Rhythms</a></li>
			<li><a id="a11" <?php if($view>='11'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h" href="file\frame11.php">Non-shockable Rhythms</a></li>
			<li><a id="a12" <?php if($view>='12'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h" href="file\frame12.php">The Choking Child</a></li>
			<li><a id="a13" <?php if($view>='13'){ ?> style="display: block;"<?php }else{ ?> style="display: none;" <?php } ?> class="h" href="file\frame13.php">Post-Course Test</a></li>
            
</ol>
</div>				
		
	</div>


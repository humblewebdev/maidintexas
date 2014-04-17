<?php
// Need error handling
// require("signup.class.php");
// session_start();
// $errors;
// $cleanArray = array();
// if(isset($_POST) && !empty($_POST)){
// 		$datePattern = '/^((1)[012]|[1-9])-([0-3][0-9]|[0-9])-(\d+)/';
// 		$cleanTypeArray = array("Morning", "Afternoon");
// 		$allowedCost = array("$150 - $180", 
// 							 "$180 - $240", 
// 							 "$210 - $300", 
// 							 "$270 - $360", 
// 							 "$300 - $420", 
// 							 "$120 - $150", 
// 							 "$130 - $210", 
// 							 "$180 - $210", 
// 							 "$240 - $300", 
// 							 "$360 - $480", 
// 							 "$175 - 210",
// 							 "$210 - 280",
// 							 "$245 - 350",
// 							 "$350 - 490",
// 							 "$420 - 560",
// 							 "$315 - 420",
// 							 "$140 - 175",
// 							 "175 - 245",
// 							 "$210 - 245",
// 							 "$280 - 350",
// 							 "$187.50 - 225",
// 							 "$225 - 300",
// 							 "$262.50 - 375",
// 							 "$375 - 525",
// 							 "$450 - 600",
// 							 "$337.50 - 450",
// 							 "$150 - 187.50",
// 							 "$187.50 - 262.50",
// 							 "$225 - 262.50",
// 							 "$300 - 375",
// 							 "$105",
// 							 "$140",
// 							 "$175",
// 							 "$245",
// 							 "$280",
// 							 "$315",
// 							 "$350",
// 							 "$385",
// 							 "$455",
// 							 "$490",
// 							 "$525",
// 							 "$560",
// 							 "$112.5",
// 							 "$187.5",
// 							 "$225",
// 							 "262.5",
// 							 "$337.5",
// 							 "$375",
// 							 "$412.5",
// 							 "$487.5",
// 							 "$525",
// 							 "$562.5",
// 							 "$592.5",
// 							 "$90", 
// 							 "$120", 
// 							 "$150", 
// 							 "$180", 
// 							 "$210", 
// 							 "$240", 
// 							 "$270", 
// 							 "$300", 
// 							 "$330", 
// 							 "$360", 
// 							 "$390", 
// 							 "$420", 
// 							 "$450", 
// 							 "$480");
							 
// 		if(!empty($_POST['flexible']) && isset($_POST['flexible']) && $_POST['flexible']  == '(Morning or Afternoon)'){
// 			$cleanArray['startTime'] = $_POST['flexible'];
// 		} else if(isset($_POST['startTime']) && !empty($_POST['startTime']) && in_array($_POST['startTime'], $cleanTypeArray)){
// 				$cleanArray['startTime'] = $_POST['startTime'];
// 		} else {
// 				$errors[] = 'Please enter a time you are available!';
// 		}
// 		if(isset($_POST['inputDate'])&&!empty($_POST['inputDate']) && preg_match($datePattern, $_POST['inputDate'])){
// 				$cleanArray['inputDate'] = $_POST['inputDate'];
// 			} else {
// 				$errors[] = 'Please choose a day you would like us to come and clean.';
// 			}
// 		if(isset($_POST['newCost'])  && !empty($_POST['newCost'])){
// 			$cleanVar = $_POST['newCost'];
// 			 if(in_array($cleanVar, $allowedCost)){
// 				BookingSignup::setApproxCost($cleanVar);
// 			}
// 		}
// 		if(isset($cleanArray['inputDate']) && !empty($cleanArray['inputDate']) && ((isset($cleanArray['startTime']) && !empty($cleanArray['startTime'])) || (isset($cleanArray['flexible']) && $cleanArray['flexible']  == '(Morning or Afternoon)') ) ){
// 			try {
// 				BookingSignup::setForm2Vars($cleanArray);
// 				header("Location: page3.php");
// 			} catch(Exception $e){
// 				echo $e->message();
// 			}
// 		}
// 		foreach($_POST as $key => $post){
// 			echo "$key: $post<br>";
// 		}
// 		echo '<br>';
// 	}
// 	$cleanType = BookingSignup::getTypeClean();
?>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<!-- <link rel="stylesheet" href="style.css"/> -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/bootstrap/css/bootstrap.css'; ?>"/>
	
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <!--<script src="script.js"></script>-->
  <script src="<?php echo get_template_directory_uri() . '/bootstrap/js/bootstrap.js'; ?>"></script>
  <script src="<?php echo get_template_directory_uri() . '/js/calendar.js'; ?>"></script>

<div id="wrapper">


<?php
	if(isset($errors) && !empty($errors)){
		foreach($errors as $error){
			echo "<div class=\"alert alert-danger\">".$error."</div>";
		}
	}
?>


<div class="formWrapper">
<form method="post" action="" >
	<div id="datepicker"></div>
	<input type="hidden" id="dateValue" name="inputDate">
	<div class="alert_day"><h2>Price Change Alert</h2>Because of the high demand for Fridays and Saturdays an additional charge will apply.<br>
	Fridays: additional $10/hr<br>
	Saturdays: additional $15/hr</div>
	
	<label class="whatTime pull_left">We'll come in the </label>
	<div class="selector pull_left" id="uniform-new-signup-time-list" style="width:128px;">
		<span style=" width:110px; -webkit-user-select: none;">(option)</span>
		<select name="startTime" id="new-signup-time-list">
			<option value="(option)">(select)</option>
			<option value="Morning">Morning</option>
			<option value="Afternoon">Afternoon</option>
		</select>
    </div>
    <input type="hidden" name="newCost" id="inputCost">
    <div class="imFlexible">
    	<input type="checkbox" name="flexible" id="flexible" value="(Morning or Afternoon)" onclick="setTimeLabel();">
    	<label for="flexible">I'm flexible (Morning or Afternoon)</label>
    </div>
    <div class="clear"></div>
	<button id="submit-step1" class="submit" > Next Step!</button>
</form>
</div>
<div class="apptDetails">
		<div class="summary-header">
		<span>Your Booking Information</span>
		</div>
		<div class="summary-content">
			<!--Very Bad Practice needs to be fixed-->
			<ul>
			<?php if($cleanType != 'Hourly Rate'){ ?>
			<li><span>House Size: <div class="summaryValue sqft"><?php echo BookingSignup::getSquareFoot();?></div> SQ/FT</span></li>
			<?php } ?>
			<li><span>Estimated Hours: <div class="summaryValue hrs"><?php echo BookingSignup::getHours();?></div>hrs</span></li>
			<li><span>Estimated Cost: <div class="summaryValue cost"><?php echo BookingSignup::getApproxCost();?></div><div class="tax"> (+Sales Tax)</div></span></li>
			
			<li><span>Cleaning Date: <div class="summaryValue cleaningDate"></div></span></li>
			<li><span>Cleaning Time: <div class="summaryValue cleaningTime"></div></span></li>
			</ul>
		</div>
</div>
<div class="clear"></div>
</div>
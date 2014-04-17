<?php
/*
  Template Name: Form Page 2
 */    

  	require_once get_template_directory() . '/required/signup.class.php';
  	$errors;
	$cleanType = BookingSignup::getTypeClean();
?>



    <?php get_header();?>
<div class="hm-main-content-wrapper">
    <!-- Content Area start -->
         <div class="custom-widget-area">
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
    <input type="hidden" name="page2-submission" value="1" />    
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
        </div>
    
    <!-- Content Area End -->
    </div>
</div>
<!-- end of wrapper -->
    
<?php  get_footer();?>
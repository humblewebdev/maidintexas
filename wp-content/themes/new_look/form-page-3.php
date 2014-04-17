<?php
/*
  Template Name: Form Page 3
 */   

require_once get_template_directory() . '/required/signup.class.php';
require_once get_template_directory() . '/required/Input.class.php';

$cleanType = BookingSignup::getTypeClean();
$errors;

  ?>

<?php get_header();?>
<div class="hm-main-content-wrapper">
    <!-- Content Area start -->
	<div class="custom-widget-area">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<!-- <link rel="stylesheet" href="style.css"/> -->
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="<?php echo get_template_directory_uri() . '/js/contact_form.js'; ?>"></script>
	<style>	
		.contact_info {
			margin: 20px auto;
			width: 475px;
		}
		
		#zip{
			width:56px;
		}
		#city {
			width:120px
		}
		#state {
			width: 75px;		
		}
		.address {
			width: 382px;
		}
		.contact_info input:focus{
			outline:none;
		}
		label {
			font-size:18px;
			margin-left: 0;
			color: #126280;
			font-family: "proxima_nova_rgregular", sans-serif;
			font-family: "Proxima Nova", Helvetica, sans-serif;
		}
		input {
			height: 28px;
			font-size: 16px;
			border: 4px #126280 solid;
			margin-top: 4px;
			margin-right: 0px;
			margin-bottom: 10px;
			margin-left: 0px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
		}
		input.error {
			border 4px red solid;
		}
		#fName {
			width: 125px;	
		}
		
		#lName {
			width: 125px;
		}
		#otherInst {
			width: 100%;
		}
		#hiddenKeyInput {
			width: 100%;
		}
		.optional {
			width: 352px;
			border:4px solid #aaaaaa;
		}
		/* Radio */
		div.radio {
			margin-left: 12px;
  			position: relative; }
	  div.radio, div.radio span, div.radio input {
	  		float:left;
    		width: 18px;
		    height: 18px; }
	  div.radio span {
    		display: -moz-inline-box;
		    display: inline-block;
		    *display: inline;
		    zoom: 1;
    		text-align: center;
		    /*background-position: 0 -279px;*/
			background:url(<?php echo get_template_directory_uri() . '/images/radio.png'; ?>) no-repeat -1px 0 /* was -1px */
 		}
		div.radio span.checked {
  			background-position: -64px 0px; /* 041913 was -63 */
		}
		div.radio:first-child {
			margin-left:15px;
		}
  		div.radio input {
    		opacity: 0;
    		filter: alpha(opacity=0);
    		-moz-opacity: 0;
    		border: none;
   			background: none;
    		display: -moz-inline-box;
		    display: inline-block;
		    *display: inline;
		    zoom: 1;
		    text-align: center; }
		    float:left;
		div.radio.active span {
		   background-position: -64px 0px; /* was -63px */
		}
		div.radio.active span.checked {
		   background-position: -64px 0px; /* was -63px */
		}
		  div.radio.hover span, div.radio.focus span {
		    background-position: -36px -36px -279px; }

		#entry-instructions label {
			float:left;
			margin-right: 20px;
		}
		
		#submit-final {
			margin-left: 36px;
		}
		
		label#pets-yes-label {
 			float: left;
			padding: 5px 5px 0 0;
		}
		div#uniform-pets-yes {
 			float: left;
			//margin-top: 11px; /*JON:043013 was 14 */
  			margin-right: 10px;
		}
		.phone {
			margin-top: 0px;
			width:310px;
			float: left;
		}
		#phone {
			width: 200px;
		}
		#pets-type {
			float: left;
			width: 96px;
		}
	</style>
	<div id="wrapper">
		<?php 
            if(isset($globalErrors) && !empty($globalErrors)){
                foreach($globalErrors as $error){
                    echo '<div class="alert alert-error">' . $error . '</div>';
                }
            }
        ?>
		<div class="formWrapper">
			<form action="" method="post" class="contact_info">
				<div class="contact_form_header">
			
				</div>
				<label for="fName">First Name: </label>
				<input id="fName"type="text" name="First_Name" value="<?php echo Input::get('First_Name');?>">
				
				<label for="lName">Last Name: </label>
				<input id="lName" type="text" name="Last_Name" value="<?php echo Input::get('Last_Name');?>"><br>
				
				<label for="address">Address: </label>
				<input id="address"type="text" name="Address1" class="address" value="<?php echo Input::get('Address1');?>"><br>
				
				<label for="address2">Address: </label>
				<input id="address2" type="text" name="Address2" class="address" value="<?php echo Input::get('Address2');?>"><br>
				
				<label for="city">City: </label>
				<input id="city" type="text" name="City" value="<?php echo Input::get('City');?>">
				
				<label for="state">State: </label>
				<input id="state" type="text" name="State" value="<?php echo Input::get('State');?>">
				
				<label for="zip">Zip Code: </label>
				<input id="zip" type="text" name="Zip" value="<?php echo Input::get('Zip');?>">
				
				<div class="phone">
					<label for="phone">Phone Number </label><br>
					<input id="phone" type="text" name="Phone" value="<?php echo Input::get('Phone');?>">
				</div>
				
				<div id="pets">
					<label for="pets-type" id="pets-type-label">Do you have pets?</label>
					<label for="pets-yes" id="pets-yes-label">yes</label>
					<div class="checker" id="uniform-pets-yes">
						<div class="radio-pet">
							<span>
								<input type="checkbox" id="pets-yes" name="pets-yes" value="yes" <?php echo (Input::get('pets-yes') != null) ? 'checked' : '';?>>
							</span>
						</div>
					</div>
					<input type="text" id="pets-type" name="pets-type" placeholder="Cats, dogs.." class="uniform-input text" value="<?php echo Input::get('pets-type');?>">
				</div>
				<div class="clear"></div>
				
				<div id="entry-instructions">
					<h1>How will we get In?</h1>
					<div class="radio">
						<span>
							<input type="radio" id="imHome" name="getIn" value="Ill be home" value="<?php echo Input::get('First_Name');?>">
						</span>
					</div>
					<label for="imHome">I'll be home</label>
					<div class="radio" id="hiddenKeyCheckbox">
						<span>
							<input type="radio" id="hiddenKey" name="getIn" value="Hidden Key/Gate Code">
						</span>
					</div>
					<label for="hiddenKey">Hidden Key/Gate Code</label>
					<div class="radio" id="uniform-signup-entry-instructions-other">
						<span>
							<input type="radio" id="otherInstLabel" name="getIn" value="Other">
						</span>
					</div>
					<label for="otherInstLabel">Other</label>
					<input type="text" name="EntryInstructions" id="hiddenKeyInput" placeholder="Please enter your Hidden Key/Gate Code Information!">
					<input type="text" name="otherInst" id="otherInst" placeholder="Please enter your entry instructions!">
				</div>
				<div class="clear"></div>
				<div id="additionalRequests">
					<label for="optional">(Optional): </label>
					<input id="optional" class="optional" type="text" name="option1" value="<?php echo Input::get('option1');?>">
					<label for="optional2">(Optional): </label>
					<input id="optional2" class="optional" type="text" name="option2" value="<?php echo Input::get('option2');?>">
				</div>
				<h1>Credit Card Information</h1>
				<div class="credit_card_info">
					<label for="creditCard">Card Number</label>
					<input type="password" name="Credit_Card_Number" id="creditCard">
				</div>
				<div class="cardDate">
					<label for="expDate">Exp Date</label>
					<input type="date" name="Expiration_Date" id="expDate">
					<label for="cvc">Security Code</label>
					<input type="text" name="Security_Code" id="cvc">
				</div>
				<input type="hidden" name="page3-submission" value="1" />
				<button id="submit-final" type="submit" class="submit" > Book Your Cleaning!</button>
			</form>
		</div>
			<div class="apptDetails">
				<div class="summary-header">
					<span>Your Booking Information</span>
				</div>
				<div class="summary-content">
					<?php if($cleanType != 'Hourly Rate'){ ?>
						<li><span>House Size: <div class="summaryValue sqft"><?php echo BookingSignup::getSquareFoot();?></div> SQ/FT</span></li>
					<?php } ?>
					<li><span>Estimated Hours: <div class="summaryValue hrs"><?php echo BookingSignup::getHours();?></div>hrs</span></li>
					<li><span>Estimated Cost: <div class="summaryValue cost"><?php echo BookingSignup::getApproxCost()." ";?></div><div class="tax"> (+Sales Tax)</div></span></li>
					<li><span>Cleaning Date: <div class="summaryValue cleaningDate"><?php echo BookingSignup::getinputDate();?></div></span></li>
					<li><span>Cleaning Time: <div class="summaryValue cleaningTime"><?php echo BookingSignup::getstartTime();?></div></span></li>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
</div>
<?php  get_footer();?>
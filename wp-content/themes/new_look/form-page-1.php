<?php
/*
  Template Name: Form Page 1
 */
?>
<?php get_header();?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?php echo get_template_directory_uri() . '/js/adjustquote.js'; ?>"></script>
<style>
	.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
	background:url('<?php echo get_template_directory_uri() . '/images/sliderHandle.png'; ?>') 50% 50% no-repeat;
	height: 38px;
	width: 38px;
	border: none;
	top: -10px;
	margin-left: -20px;
}
</style>


<div class="hm-main-content-wrapper">
    <!-- Content Area start -->
         <div class="custom-widget-area">


			<form method="post" id="cleanForm">
				<div id="herotext"> 
					  <h1>Book an appointment instantly below.</h1>
				</div>
				<br>
				<div class="radio-toolbar">		
				    <input type="radio" id="homeSize" name="costType" value="footage" checked onclick=changeRate(); >
				    <label for="homeSize" title="Click here to get a price based upon house size."><img src="<?php echo get_template_directory_uri() . '/images/home_glyph.png'; ?>" height="32px"><br>Quote from House Size</label>
				    <input type="radio" id="hourlyPrice" name="costType" value="hourly"  onclick=changeRate(); >
				    <label for="hourlyPrice" title="Click here to schedule cleaners to come out for a set time"><img src="<?php echo get_template_directory_uri() . '/images/clock.png';?>" height="32px"><br>Quote For Hourly Rate</label> 
				</div>   
				<br>
				<span id="cleanLabel" class="cleanType">&nbsp;</span>
				<label class="sqftLabel" or="amount">Choose the Square Footage of Your Home:</label>
				<div class="circleBorder">
					<span id="sqft" class="amount">&nbsp;</span>
					<span id="sqftHolder" class="amount">sq/ft</span>
					<span id="hourlyHolder" class="amount">Hours</span>
				</div>
				<div class="clear"></div>
					<input type="hidden" class="sqftAmount" name="sqft" style="border: 0; color: #B41A2B; font-weight: bold;" />
					<div id="slider"></div>
					<div id="HrlySlider"></div>
					<input type="hidden" class="hrs" name="hrs"  />
					<input type="hidden" class="cost" name="cost"/>
				<br>
					<!-- Radio boxes -->
				<div class="radio-toolbar" id="cleaningType">
					<input type="radio" id="radio1" name="radios" value="initial"  checked onclick=adjustQuote(); >
				    <label for="radio1" title="Click here if you want a thorough deep cleaning.">Deep Cleaning</label>
					<input type="radio" id="radio2" name="radios" value="move" onclick=adjustQuote();>
				    <label for="radio2" title="Click here if you are moving In or Out and want us to clean up for you">Move In / Out</label>
					<input type="radio" id="radio3" name="radios" value="maintain"  onclick=adjustQuote();>
				    <label for="radio3" title="Click here if you already had us deep clean and want a spruce up">Maintain Cleaning</label> 
				</div>  

				<br>
				<!-- End of radio boxes-->
				<input type="hidden" name="page1-submission" value="1" />                  
				<button type="submit" id="submit">
					<div id="leftButton">
						<span>Schedule an appointment!</span>
					</div>
					<div id="rightButton">
						<span id="quoteAmount">&nbsp;</span>
						<span id="quoteText">&nbsp;/hrs</span>
						<span id="costAmount">&nbsp;</span>
						<span id="costText"> &nbsp;/approx cost + Sales Tax</span>
					</div>
					<div class="clear"></div>
				</button>
				<div class="clear"></div>
				<p class="amountCleaners">*Price is for two cleaners come for $60 per Hour</p>
			</form>
        </div>
    
     <?php 
        
     get_sidebar(); ?>
    
    <!-- Content Area End -->
    </div>
</div>
<!-- end of wrapper -->
    
<?php  get_footer();?>


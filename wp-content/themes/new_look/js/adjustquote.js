 $(document).ready(function() {
 	changeRate();
 });
 
 $(function() {
    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      } 
    });
  });
  
  /*$(function() {
    $( "#slider" ).slider({
      min: 1000,
      max: 5000,
      step: 1000,
      slide: function( event, ui ) {
        $( ".sqftAmount" ).val( (ui.value));
        $( "#sqft" ).text( (ui.value));
        adjustQuote();
      }
    });
    $( ".sqftAmount" ).val($( "#slider" ).slider( "value" ) );
    $( "#sqft" ).text($( "#slider" ).slider( "value" ));
    adjustQuote();
});*/

function adjustQuote() {
	//Get The Input Fields
	var sqft = $( ".sqftAmount" ).val();
	var radio = $('input[name=radios]:checked').val();
	//Find Out The Approx Hours and the Approx Cost
	if(radio == "initial"){
		switch(sqft){
    		case ("1000"):
    			var hrs = "2.5 - 3";
    			var price = "$150 - $180";
    			setTextFields(hrs, price);
    			break;
    		case("2000"):
    			var hrs = "3 - 4";
    			var price = "$180 - $240";
    			setTextFields(hrs, price);
    			break;
    		case("3000"):
    			var hrs = "3.5 - 5";
    			var price = "$210 - $300";
    			setTextFields(hrs, price);
    			break;
    		case("4000"):
    			var hrs = "4.5 - 6";
    			var price = "$270 - $360";
    			setTextFields(hrs, price);
    			break;
    		case("5000"):
    			var hrs = "5 - 7";
    			var price ="$300 - $420";
    			setTextFields(hrs, price);
    			break;
    	}
	} else if(radio == "move"){
		switch(sqft){
    		case("1000"):
    			var hrs = "2.5 - 3";
    			var price = "$150 - $180";
    			setTextFields(hrs, price);
    			break;
    		case("2000"):
    			var hrs = "3 - 4";
    			var price = "$180 - $240";
    			setTextFields(hrs, price);
    			break;
    		case("3000"):
    			var hrs = "3.5 - 5";
    			var price = "$210 - $300";
    			setTextFields(hrs, price);
    			break;
    		case("4000"):
    			var hrs = "5 - 7";
    			var price = "$300 - $420";
    			setTextFields(hrs, price);
    			break;
    		case("5000"):
    			var hrs = "6 - 8";
    			var price ="$360 - $480";
    			setTextFields(hrs, price);
    			break;
		} 
	}else if(radio == "maintain") {
		switch(sqft){
    		case("1000"):
    			var hrs = "1.5";
    			var price = "$90";
    			setTextFields(hrs, price);
    			break;
    		case("2000"):
    			var hrs = "2 - 2.5";
    			var price = "$120 - $150";
    			setTextFields(hrs, price);
    			break;
    		case("3000"):
    			var hrs = "2.5 - 3.5";
    			var price = "$130 - $210";
    			setTextFields(hrs, price);
    			break;
    		case("4000"):
    			var hrs = "3 - 3.5";
    			var price = "$180 - $210";
    			setTextFields(hrs, price);
    			break;
    		case("5000"):
    			var hrs = "4 - 5";
    			var price = "$240 - $300";
    			setTextFields(hrs, price);
    			break;
		}
	}
}

function adjustHrlyQuote(){
	var sqft = $( ".sqftAmount" ).val();
    
    var hrs = sqft;
    var price = '$'+sqft*60;
    setTextFields(hrs, price);
    			
}

function changeRate(){
	var getRate = $('input[name=costType]:checked').val();
	console.log(getRate);
	if(getRate === "footage"){
		$('.sqftLabel').text('Choose the Square Footage of Your Home:');
		$('#sqftHolder').show('slow');
		$('#hourlyHolder').hide('slow');
		$('#HrlySlider').hide('slow');
		$('#slider').show('slow');
		$('#cleaningType').show('slow');
		$('radio1').show('slow');
		$('radio1').val('initial');
		$(function() {
			$( "#slider" ).slider({
		      min: 1000,
      		  max: 5000,
		      step: 1000,
		      slide: function( event, ui ) {
		        $( ".sqftAmount" ).val( (ui.value));
        		$( "#sqft" ).text( (ui.value));
		        adjustQuote();
      		  }
			});
    	$( ".sqftAmount" ).val($( "#slider" ).slider( "value" ) );
	    $( "#sqft" ).text($( "#slider" ).slider( "value" ));
    	adjustQuote();
	});
	} else if(getRate == "hourly"){
		$('.sqftLabel').text('Choose how many hours you need:');//Change label text above slider
		$('#sqftHolder').hide('slow');//Hide Label that says sqft
		$('#hourlyHolder').show('slow');//Show label that says hours
		$('#slider').hide('slow');//Hide Home Sqft slider
		$('#HrlySlider').show('slow');//Show hourly slider
		$('#cleaningType').hide('slow');//Hide radio button for cleaning types
		//
		$(function() {
			$( "#HrlySlider" ).slider({
		      min: 1.5,
      		  max: 8,
		      step: .5,
		      slide: function( event, ui ) {
		        $( ".sqftAmount" ).val( (ui.value));
        		$( "#sqft" ).text( (ui.value));
		        adjustHrlyQuote();
      		  }
			});
    	$( ".sqftAmount" ).val($( "#HrlySlider" ).slider( "value" ) );
	    $( "#sqft" ).text($( "#HrlySlider" ).slider( "value" ));
    	adjustHrlyQuote();
	});
	}
	
}
	//Set the text and input Fields
	function setTextFields(hrs, price) {
		$('#quoteAmount').text(hrs);
		$('#costAmount').text(price);
		$('.hrs').val(hrs);
		$('.cost').val(price);
		
	}
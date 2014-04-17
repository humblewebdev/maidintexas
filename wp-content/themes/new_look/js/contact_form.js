$(document).ready(function() {
		
		formValidation();
		$('#otherInst').hide();
		$('#pets-type').hide();
		$('#hiddenKeyInput').hide();
		$('div.radio span').on("click", function() {
			$('.checked').removeClass('checked');
			$(this).addClass('checked');
		});
		$('div.radio span').on("click", function (){
			$('#hiddenKeyInput').hide('slow');
			$('#otherInst').hide('slow');
		});
		$('#hiddenKeyCheckbox').on("click", function (){
			$('#otherInst').hide('slow');
			$('#hiddenKeyInput').show('slow');
		});
		$('#uniform-signup-entry-instructions-other').on("click", function (){
			$('#hiddenKeyInput').hide('slow');
			$('#otherInst').show('slow');
		});
		
		$('#pets-yes').on("click", function(){
			$('#pets')
		});
		$('div.radio-pet').click(function(){
        	if($('#pets-yes').is(':checked')) { 
        		$('#pets-type').show('slow');
        	} else {
        		$('#pets-type').hide('slow');
        	}
    	});
	});



function formValidation(){
	$("#fName").focusout(function (){
		isEmpty($(this));
	});	
	$("#lName").focusout(function (){
		isEmpty($(this));
	});	
	$("#address").focusout(function (){
		isEmpty($(this));
	});	
	$("#address2").focusout(function (){
		console.log('Address2 works!');
	});	
	$("#city").focusout(function (){
		isEmpty($(this));
	});	
	$("#state").focusout(function (){
		isEmpty($(this));
		isState($(this));
	});	
	$("#zip").focusout(function (){
		isEmpty($(this));
	});	
}

function isEmpty(element){
	var inputStr = element.val();
	if(!inputStr ||inputStr.length === 0){
			return element.addClass('error');
	}else {
		return element.removeClass('error');
	}
}

function isState(element){
	var stateInput = element.val();
	var states = array();
	if($.inArray()){
		return element.removeClass('error');
	} else {
		return element.addClass('error');
	}
}
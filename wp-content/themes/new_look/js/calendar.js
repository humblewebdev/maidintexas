var quoteAmount;
var quoteHrs;
$(document).ready(function() {
	setDatePicker();
	selectHandler();
	$(".alert_day").hide();
	quoteHrs = $('.hrs').text();
	quoteAmount = $('.cost').text();
});

function setDatePicker() {
    $( "#datepicker" ).datepicker({
    changeMonth: false, 
    changeYear: false, 
    dateFormat: 'yy-mm-dd',
    minDate: 1, // 0 days offset = today
    maxDate: 90,
    beforeShowDay: function(date) {
    	var restDays = ["2013-11-28","2013-12-25","2014-01-01"];
    	var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        return [ restDays.indexOf(string) == -1 ];
    },beforeShowDay: function(date) {
    	var day = date.getDay();
        return [(day != 0), ''];
    },
    onSelect: function(dateText) {
        var dateAsString = dateText; //the first parameter of this function
      		var dateAsObject = $(this).datepicker( 'getDate' ); //the getDate method
      		var dayOfWeek = dateAsObject.getDay();
      		var dateObject = $(this).datepicker("getDate"); // get the date object
			var dateString =  (dateObject.getMonth() + 1) + '-' + dateObject.getDate() + '-' + dateObject.getFullYear();// Y-n-j in php date() format
      		$("#dateValue").val(dateString);
      		$(".cleaningDate").text(' ' + dateString);
      		if(dayOfWeek == '5' || dayOfWeek == '6'){
      			$(".alert_day").show('slow');
      			changeQuote(dayOfWeek);
      		} else {
      			$(".alert_day").hide('slow');
      			changeQuote(dayOfWeek);
      		}
      		
    }
    
  });
}

function setTimeLabel(){
	$(".selector span").text('(select)');
	$('.cleaningTime').text('Morning or Afternoon');
}

function selectHandler(){
	$("select").change(function () {
	$('.imFlexible').find('input').prop('checked', false); 
  var str = "";
  $("select option:selected").each(function () {
        str += $(this).text() + " ";
      });
  $(".selector span").text(str);
  if(str.trim() == "(select)"){
  		str = "";
	  $(".cleaningTime").text(' ' + str);
  } else {
  	$(".cleaningTime").text(' ' + str);
  }
})
.trigger('change');
}

function changeQuote(dayOfWeek){
	
	if(dayOfWeek == 5){
		switch(quoteHrs){
			case '1.5': 
			case '2': 
			case '2.5': 
			case '3': 
			case '3.5': 
			case '4': 
			case '4.5': 
			case '5': 
			case '5.5': 
			case '6': 
			case '6.5': 
			case '7': 
			case '7.5': 
			case '8':
				var total = '$'+(quoteHrs*70);
				$('.cost').text(total);
				$('#inputCost').val(total);
				break;
			case '2.5 - 3':
				var cost = '$175 - 210';
				$('.cost').text(cost);
				$('#inputCost').val('$175 - 210');
				break;
			case '3 - 4':
				var cost = '$210 - 280';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '3.5 - 5':
				var cost = '$245 - 350';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '5 - 7':
				var cost = '$350 - 490'
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '6 - 8':
				var cost = '$420 - 560';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '4.5 - 6':
				var cost = '$315 - 420';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '2 - 2.5':
				var cost = '$140 - 175';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '2.5 - 3.5':
				var cost = '$175 - 245';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '3 - 3.5':
				var cost = '$210 - 245';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '4 - 5':
				var cost = '$280 - 350';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
		}
	}else if(dayOfWeek == 6){
		switch(quoteHrs){
			case '1.5': 
			case '2': 
			case '2.5': 
			case '3': 
			case '3.5': 
			case '4': 
			case '4.5': 
			case '5': 
			case '5.5': 
			case '6': 
			case '6.5': 
			case '7': 
			case '7.5': 
			case '8':
				var total = '$'+((quoteHrs)*75);
				$('.cost').text(total);
				$('#inputCost').val(total);
				break;
			case '2.5 - 3':
				var cost = '$187.50 - 225';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '3 - 4':
				var cost = '$225 - 300';
				$('.cost').text(cost);
				$('#InputCost').val(cost);
				break;
			case '3.5 - 5':
				var cost = '$262.50 - 375';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '5 - 7':
				var cost = '$375 - 525';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '6 - 8':
				var cost = '$450 - 600';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '4.5 - 6':
				var cost = '$337.50 - 450';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '2 - 2.5':
				var cost = '$150 - 187.50';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '2.5 - 3.5':
				var cost = '$187.50 - 262.50';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '3 - 3.5':
				var cost = '$225 - 262.50';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
			case '4 - 5':
				var cost = '$300 - 375';
				$('.cost').text(cost);
				$('#inputCost').val(cost);
				break;
		}
	}else {
		$('.cost').text(quoteAmount);
	}
}

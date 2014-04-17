<?php
class BookingSignup {
	private static $squareFoot;
	private static $hours;
	private static $approxCost;
	private static $typeClean;
	private static $date;
	private static $time;
	private static $firstName;
	private static $lastName;
	private static $address;
	private static $address2;
	private static $city;
	private static $state;
	private static $zip;
	
	function construct() {
		
	}
	//Setter functions are setup to take arrays from each one of the forms
	public static function setForm1Vars($form1Array = null){
		if(isset($form1Array) && !empty($form1Array)){
		$_SESSION['squareFoot'] = $form1Array['squareFoot'];
		$_SESSION['hours'] = $form1Array['hours'];
		$_SESSION['approxCost'] = $form1Array['cost'];
		$_SESSION['typeClean'] = $form1Array['cleanType'];
		
		}
	}
	
	
	public static function setForm2Vars($form2Array = null){
		$_SESSION['inputDate'] = $form2Array['inputDate'];
		$_SESSION['startTime'] = $form2Array['startTime'];
	}
	//If user chooses friday or saturday need the ability to change the approxCost variable
	public static function setApproxCost($approxCost){
		$_SESSION['approxCost'] = $approxCost;
	}
	
	function setForm3Vars(){
	
	}
	
	
	//Getter functions
	public static function getSquareFoot(){
		return $_SESSION['squareFoot'];
	}
	
	public static function getHours(){
		return $_SESSION['hours'];
	}
	
	public static function getApproxCost(){
		return $_SESSION['approxCost'];
	}
	
	public static function getTypeClean(){
		return $_SESSION['typeClean'];
	}
	
	public static function getInputDate(){
		return $_SESSION['inputDate'];
	}
	
	public static function getStartTime(){
		return $_SESSION['startTime'];
	}
	
	//Misc Functions
	function sendConfirmationEmail() {
		
	}
	
	
	
	
}
?>
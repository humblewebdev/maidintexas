<?php
function getRealIpAddr()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function escape($string){
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}

// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Home Sidebar',
	'id'   => 'sidebar',
	'description'   => 'Display Widget Items in the Home Sidebar.',
	'before_widget' => '<div class="home-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="home-widget-title">',	
	'after_title'   => '</h3>'
			));
}

// Regsiter Footer widget area
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	'name' => 'Page Sidebar',
	'id'   => 'sidebar_page',
	'description'   => 'Display Widget Items in the Home Sidebar.',
	'before_widget' => '<div class="page-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="page-widget-title">',	
	'after_title'   => '</h3>'
			));
}

add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}

add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page(){
    add_menu_page( 'Bookings', 'Bookings', 'manage_options', 'custompage','my_custom_menu_page',  get_template_directory_uri() . '/images/menu_logo.png', 6 );
}

function my_custom_menu_page(){
    require_once get_template_directory() . '/required/booking_table.php';
}

function page1_submission() {

  if ( isset( $_POST['page1-submission'] ) && '1' == $_POST['page1-submission'] ) {

	require get_template_directory() . '/required/signup.class.php';
    if(isset($_POST) && !empty($_POST)){
        $allowedSQFT = array("1000", 
                             "2000", 
                             "3000", 
                             "4000", 
                             "5000", 
                             "1.5", 
                             "2", 
                             "2.5", 
                             "3", 
                             "3.5", 
                             "4", 
                             "4.5", 
                             "5", 
                             "5.5", 
                             "6", 
                             "6.5", 
                             "7", 
                             "7.5", 
                             "8");
        $allowedHours = array("2.5 - 3", 
                              "3 - 4", 
                              "3.5 - 5", 
                              "5 - 7", 
                              "6 - 8", 
                              "4.5 - 6", 
                              "1.5", 
                              "2 - 2.5", 
                              "2.5 - 3.5", 
                              "3 - 3.5", 
                              "4 - 5", 
                              "1.5", 
                              "2", 
                              "2.5", 
                              "3", 
                              "3.5", 
                              "4", 
                              "4.5", 
                              "5", 
                              "5.5", 
                              "6", 
                              "6.5", 
                              "7", 
                              "7.5", 
                              "8");
                              
        $allowedCost = array("$150 - $180", 
                             "$180 - $240", 
                             "$210 - $300", 
                             "$270 - $360", 
                             "$300 - $420", 
                             "$120 - $150", 
                             "$130 - $210", 
                             "$180 - $210", 
                             "$240 - $300", 
                             "$360 - $480", 
                             "$90", 
                             "$120", 
                             "$150", 
                             "$180", 
                             "$210", 
                             "$240", 
                             "$270", 
                             "$300", 
                             "$330", 
                             "$360", 
                             "$390", 
                             "$420", 
                             "$450", 
                             "$480");
        $allowedCleanType = array("initial", "move", "maintain");
        $allowedChargeType = array("homeSize", "hourly");
        $cleanVars = array();
        //add sqft to cleanVars array
        if(in_array($_POST['sqft'], $allowedSQFT)){
            $cleanVars['squareFoot'] = $_POST['sqft'];
        }
        if(in_array($_POST['hrs'], $allowedHours)){
            $cleanVars['hours'] = $_POST['hrs'];
        }
        if(in_array($_POST['cost'], $allowedCost)){
            $cleanVars['cost'] = $_POST['cost'];
        }
        if(in_array($_POST['radios'], $allowedCleanType)){
            $cleanVars['cleanType'] = $_POST['radios'];
        }
        if(in_array($_POST['costType'], $allowedChargeType)){
            $cleanVars['chargeType'] = $_POST['costType'];
            if($cleanVars['chargeType'] == 'hourly'){
                $cleanVars['cleanType'] = 'Hourly Rate';
            } else if($cleanVars['chargeType'] == 'footage'){
                if(in_array($_POST['radios'], $allowedCleanType)){
                    $cleanVars['cleanType'] = $_POST['radios'];
                }
            }
            
        }
        if( isset($cleanVars['squareFoot']) && isset($cleanVars['cost']) && isset($cleanVars['hours']) && isset($cleanVars['cleanType'])) {
            try{
                BookingSignup::setForm1Vars($cleanVars);
                //redirect to page 2
                //header('Location: localhost:8888/page-2');
                wp_redirect( site_url() . '/page-2/', 301 ); 
                exit();
                // print_r($_SESSION);
                // print_r($_POST);
            } catch(Exception $e){
                echo "An Error happened!";
            }
        }
    }

  } // end if

} // end my_theme_send_email

add_action( 'init', 'page1_submission' );


function page2_submission() {

  if ( isset( $_POST['page2-submission'] ) && '1' == $_POST['page2-submission'] ) {

  	require_once get_template_directory() . '/required/signup.class.php';
	$errors;
	$cleanArray = array();
	if(isset($_POST) && !empty($_POST)){
			$datePattern = '/^((1)[012]|[1-9])-([0-3][0-9]|[0-9])-(\d+)/';
			$cleanTypeArray = array("Morning", "Afternoon");
			$allowedCost = array("$150 - $180", 
								 "$180 - $240", 
								 "$210 - $300", 
								 "$270 - $360", 
								 "$300 - $420", 
								 "$120 - $150", 
								 "$130 - $210", 
								 "$180 - $210", 
								 "$240 - $300", 
								 "$360 - $480", 
								 "$175 - 210",
								 "$210 - 280",
								 "$245 - 350",
								 "$350 - 490",
								 "$420 - 560",
								 "$315 - 420",
								 "$140 - 175",
								 "175 - 245",
								 "$210 - 245",
								 "$280 - 350",
								 "$187.50 - 225",
								 "$225 - 300",
								 "$262.50 - 375",
								 "$375 - 525",
								 "$450 - 600",
								 "$337.50 - 450",
								 "$150 - 187.50",
								 "$187.50 - 262.50",
								 "$225 - 262.50",
								 "$300 - 375",
								 "$105",
								 "$140",
								 "$175",
								 "$245",
								 "$280",
								 "$315",
								 "$350",
								 "$385",
								 "$455",
								 "$490",
								 "$525",
								 "$560",
								 "$112.5",
								 "$187.5",
								 "$225",
								 "262.5",
								 "$337.5",
								 "$375",
								 "$412.5",
								 "$487.5",
								 "$525",
								 "$562.5",
								 "$592.5",
								 "$90", 
								 "$120", 
								 "$150", 
								 "$180", 
								 "$210", 
								 "$240", 
								 "$270", 
								 "$300", 
								 "$330", 
								 "$360", 
								 "$390", 
								 "$420", 
								 "$450", 
								 "$480");
								 
			if(!empty($_POST['flexible']) && isset($_POST['flexible']) && $_POST['flexible']  == '(Morning or Afternoon)'){
				$cleanArray['startTime'] = $_POST['flexible'];
			} else if(isset($_POST['startTime']) && !empty($_POST['startTime']) && in_array($_POST['startTime'], $cleanTypeArray)){
					$cleanArray['startTime'] = $_POST['startTime'];
			} else {
				global $errors;
					$errors[] = 'Please enter a time you are available!';
			}
			if(isset($_POST['inputDate'])&&!empty($_POST['inputDate']) && preg_match($datePattern, $_POST['inputDate'])){
					$cleanArray['inputDate'] = $_POST['inputDate'];
				} else {
					global $errors;
					$errors[] = 'Please choose a day you would like us to come and clean.';
				}
			if(isset($_POST['newCost'])  && !empty($_POST['newCost'])){
				$cleanVar = $_POST['newCost'];
				 if(in_array($cleanVar, $allowedCost)){
					BookingSignup::setApproxCost($cleanVar);
				}
			}
			if(isset($cleanArray['inputDate']) && !empty($cleanArray['inputDate']) && ((isset($cleanArray['startTime']) && !empty($cleanArray['startTime'])) || (isset($cleanArray['flexible']) && $cleanArray['flexible']  == '(Morning or Afternoon)') ) ){
				try {
					BookingSignup::setForm2Vars($cleanArray);
					//header("Location: page3.php");
					wp_redirect( site_url() . '/page-3/', 301 ); 
                	exit();
				} catch(Exception $e){
					echo $e->getMessage();
				}
			}
		}

  }
}

add_action( 'init', 'page2_submission' );


function page3_submission() {

	if ( isset( $_POST['page3-submission'] ) && '1' == $_POST['page3-submission'] ) {

		require_once get_template_directory() . '/required/signup.class.php';
			require_once get_template_directory() . '/anet_php_sdk/AuthorizeNet.php'; 
			require_once get_template_directory() . '/required/Input.class.php';
			require_once get_template_directory() . '/required/Validate.class.php';
			define("AUTHORIZENET_API_LOGIN_ID", "773mcpCMK");
			define("AUTHORIZENET_TRANSACTION_KEY", "35ee9G994fDdHRJs");
			$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'First_Name' => array(
				'required' => true
			),
			'Last_Name' => array(
				'required' => true
			),
			'Address1' => array(
				'required' => true
			),
			'City' => array(
				'required' => true
			),
			'State' => array(
				'required' => true
			),
			'Zip' => array(
				'required' => true,
				'min' => 5
			),
			'Phone' => array(
				'required' => true
			),
			'getIn' => array(
				'required' => true
			),
			'Credit_Card_Number' => array(
				'required' => true
			),
			'Expiration_Date' => array(
				'required' => true
			),
			'Security_Code' => array(
				'required' => true
			)
		));

		if($validation->passed()){

		    $sale = new AuthorizeNetAIM;
		    $sale->card_num           = Input::get('Credit_Card_Number');
	        $sale->exp_date           = Date('m/y',  strtotime(Input::get('Expiration_Date')));
	        $sale->amount             = 1;
	        $sale->description        = $description = "Maid In Texas Cleaning";
	        $sale->first_name         = $first_name = Input::get('First_Name');
	        $sale->last_name          = $last_name = Input::get('Last_Name');
	        $sale->address            = $address = Input::get('Address1') . ' ' . Input::get('Address2');
	        $sale->city               = $city = Input::get('City');
	        $sale->state              = $state = Input::get('State');
	        $sale->zip                = $zip = Input::get('Zip');
	        $sale->country            = $country = "US";
	        $sale->phone              = $phone = Input::get('Phone');
	        $sale->email              = $email = Input::get('Email');
	        $sale->customer_ip        = $customer_ip = getRealIpAddr();
	        $sale->card_code 	      = $card_code = Input::get('Security_Code');

		    $response = $sale->authorizeOnly();
		    if ($response->approved) {

		    	//add Items to database
		    	global $wpdb;
		    	$wpdb->insert( 'wp_reservations', 
					array( 
						'firstName' => Input::get('First_Name'), 
						'lastName' => Input::get('Last_Name'),
						'address' => Input::get('Address1'),
						'address2' => Input::get('Address2'),
						'city' => Input::get('City'),
						'state' => Input::get('State'),
						'zip' => Input::get('Zip'),
						'phone' => Input::get('Phone'),
						'pet_type' => Input::get('pets-type'),
						'getIn' => Input::get('getIn'),
						'option1' => Input::get('Option1'),
						'option2' => Input::get('Option2'),
						'estHours' => BookingSignup::getHours(),
						'estCost' => BookingSignup::getApproxCost(),
						'cleaningDate' => BookingSignup::getinputDate(),
						'startTime' => BookingSignup::getstartTime(),
						'houseSize' => BookingSignup::getSquareFoot(),
						'cleanType' => BookingSignup::getTypeClean()
					)	 
				);
				echo $wpdb->print_error();
		    	wp_redirect( site_url() . '/thank-you/', 301 );
		    	exit();
		    }else {
		    	//response declined
		    	global $globalErrors;
		    	$globalErrors = array($response->response_reason_text);
		    }
		}else {
			 global $globalErrors;
			$globalErrors = $validation->errors();
		}
	}
}

add_action( 'init', 'page3_submission' );
?>
<?php 
    //include "dbcon.php";

	$payment_id = $statusMsg = ''; 
	$ordStatus = 'error';
	$id = '';

	// Check whether stripe token is not empty

	if(!empty($_POST['stripeToken'])){

		// Get Token, Card and User Info from Form
		$token = $_POST['stripeToken'];
		$name = $_POST['first_name'] . ' '. $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$billing_address = $_POST['billing_address'];
		$billing_address_2 = $_POST['billing_address_2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$zip = $_POST['zip'];
		$card_no = $_POST['card_number'];
		$card_cvc = $_POST['card_cvc'];
		$card_exp_month = $_POST['card_exp_month'];
		$card_exp_year = $_POST['card_exp_year'];

		$productId = $_POST['productId'];

	    $price = $_POST['amount'];
	    $pr_desc = $_POST['item_name'];

		// Include STRIPE PHP Library
		require_once('stripe-php/init.php');

		// set API Key
		$stripe = array(
		"SecretKey"=>"sk_test_cEjXShRlZO1YrzP8Txn6Ulya00EhUj1dRS",
		"PublishableKey"=>"pk_test_18lgnnPV3SZZn36tyAFO131T00P2pCl90m"
		);

		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey($stripe['SecretKey']);

		// Add customer to stripe 
	    $customer = \Stripe\Customer::create(array( 
	        
	        'source'  => $token,
	        'name' => $name,
			'email' => $email, 
			'phone' => $phone,  
	        'description'=>$pr_desc,
			'address' => array(
				'line1'  => $billing_address,
				'line2'  => $billing_address_2,
				'city'  => $city,
				'state'  => $state,
				'country'  => $country,
				'postal_code'  => $zip,
			 ),
	    ));
		// echo '<pre>';
		// print_r($customer); die;

	    // Generate Unique order ID 
	    $orderID = strtoupper(str_replace('.','',uniqid('', true)));
	     
	    // Convert price to cents 
	    $itemPrice = ($price*100);
	    $currency = "usd";
	    $itemName = $pr_desc;

	    // Charge a credit or a debit card 
	    $charge = \Stripe\Charge::create(array( 
	        'customer' => $customer->id, 
	        'amount'   => $itemPrice, 
	        'currency' => $currency, 
	        'description' => $itemName, 
	        'metadata' => array( 
	            'order_id' => $orderID 
	        ) 
	    ));

	    // Retrieve charge details 
    	$chargeJson = $charge->jsonSerialize();
		//echo '<pre>'; print_r($chargeJson); die;

    	// Check whether the charge is successful 
    	if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 

	        // Order details 
	        $transactionID = $chargeJson['balance_transaction']; 
	        $paidAmount = $chargeJson['amount']; 
	        $paidCurrency = $chargeJson['currency']; 
	        $payment_status = $chargeJson['status'];
	        $payment_date = date("Y-m-d H:i:s");
	        $dt_tm = date('Y-m-d H:i:s');


	        // If the order is successful 
	        if($payment_status == 'succeeded'){ 
				include('../assets/php/order-form.php');
				echo '1';
	            //header('Location: ../thank-you.html'); 
				die;
	    	} else{ 
				echo '0';
	            //header('Location: ../order-cancelled.html');
				 die;
	        } 
	    } else{ 
	        echo '0';
	            //header('Location: ../order-cancelled.html');
				 die;
	    } 
	} else{ 
	    echo '0';
	            //header('Location: ../order-cancelled.html');
				 die;
	} 
	
?>

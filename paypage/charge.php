<?php

session_start();
require_once('vendor/autoload.php');

require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_51Kj0tbEkWe1ZryjPkEvs6X6KtAN7ywE2cPZK9eAdC606M468uXk6HBC1XyhMeBYROzTq1kSZvsSdJABuvkFAsOFb00WV1brvUU');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 //$email = $_SESSION['email'];//$POST['email'];
 $postcode = $POST['postcode'];
 $token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $_SESSION['email'],//$email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 95000,
  "currency" => "gbp",
  "description" => "Premium Subscription",
  "customer" => $customer->id
));

// Customer Data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'postcode' => $postcode,
  'email' => $_SESSION['email']// $email
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);

//echo $charge->status;


// Transaction Data
$transactionData = [
  'transaction_id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);




// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);



//echo $charge;
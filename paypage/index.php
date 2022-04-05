<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet.css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
    <title>Pay Page</title>
</head>
<body>
  
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Warning! This is a mock website using stripe. Do NOT enter you card information below. Please input: 4242 4242 4242 4242 as the card number to proceed
  </div>
  
  <div class="container">

  

<h2 class="my-4 text-center">Premium Subscription Payment Page</h2>

<p class="my-4 text-center">Please input your billing card and address details to proceed</p>


<form action="./charge.php" method="post" id="payment-form">
    <div class="form-row">
        <input type="text" name="first_name" class="form-control mb-3 StripeElement
         StripeElement--empty" placeholder="First Name">
         <input type="text" name="last_name" class="form-control mb-3 StripeElement
         StripeElement--empty" placeholder="Last Name">
         <input type="text" name="postcode" class="form-control mb-3 StripeElement
         StripeElement--empty" placeholder="Postcode">
         
<div id="card-element" class="form-control>

</div>

<div id="card-errors" role="alert"></div>
</div>


<button>Submit Payment</button>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src= "https://js.stripe.com/v3"></script>
<script src= "./js/charge.js"></script>
</body>
</html>

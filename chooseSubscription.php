<?php
session_start();
$e = $_SESSION['email'];


# Open database connection.
require ( 'connect1.php' ) ;


# Check if email address already registered.
if ( empty( $errors ) )
{
  $q = "SELECT user_id FROM users WHERE email='$e'" ;
  $r = @mysqli_query ( $link, $q ) ;
  if ( mysqli_num_rows( $r ) != 0 ){

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
     $_SESSION[ 'user_id' ] = $row['user_id'];
    
  }} ;
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Stripe Checkout Sample</title>
    <meta name="description" content="A demo of Stripe Payment Intents" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/global.css" />
    <!-- Load Stripe.js on your website. -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./script.js" defer></script>
  </head>

  <body>
    <div class="togethere-background"></div>
    <div class="sr-root">
      <div class="sr-main">
        <header class="sr-header">
          
        </header>
        <h1>Choose a subscription option</h1>

        <div class="price-table-container">
          <section>
            <form action="home.php" method="POST">
              <input type="hidden" id="basicPrice" name="priceId">
              <img
                src="img/rocket.gif"
                width="120"
                height="120"
                />
              <div class="name">Basic</div>
              <div class="price">£0.00</div>
              <div class="duration">always</div>
              <button id="basic-plan-btn">Select</button>
            </form>
          </section>
          <section>
            <form action="/webflix/paypage" method="POST">
              <input type="hidden" id="proPrice" name="priceId">
              <img
                src="img/video.gif"
                width="120"
                height="120"
                />
              <div class="name">Professional</div>
              <div class="price">£99.99</div>
              <div class="duration">per year</div>
              <button id="pro-plan-btn">Select</button>
            </form>
          </section>
        </div>
      </div>
    </div>
    <div id="error-message" class="error-message"></div>
  </body>
</html>



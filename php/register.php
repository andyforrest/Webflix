
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

# Include HTML static file login.html
include ( 'login.html' ) ;






# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
# Connect to the database.
  //require ('includes/connect_db.php'); 
  require ('connect1.php');
 # Initialize an error array.
  $errors = array();
  
  
  
  
  
  
# Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }
  if ( empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email.' ; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }
  
  
  
  
  
  
  
  
  
# Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  if ( !empty($_POST[ 'card_number' ] ) )
  {
   
    { $card_no = mysqli_real_escape_string( $link, trim( $_POST[ 'card_number' ] ) ) ; }
  }
  else { $errors[] = 'Enter your card number.' ; }
  
  
  if ( !empty($_POST[ 'exp_month' ] ) )
  {
   
    { $exp_m = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_month' ] ) ) ; }
  }
  else { $errors[] = 'Enter your exp month.' ; }
  
  if ( !empty($_POST[ 'exp_year' ] ) )
  {
   
    { $exp_y = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_year' ] ) ) ; }
  }
  else { $errors[] = 'Enter your exp year.' ; }
  
  if ( !empty($_POST[ 'cvv' ] ) )
  {
   
    { $cvv = mysqli_real_escape_string( $link, trim( $_POST[ 'cvv' ] ) ) ; }
  }
  else { $errors[] = 'Enter your cvv.' ; }
  
  
  
  
  
  
  
  
  
# Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
  }
  
  
  
//# On success register user inserting into 'users' database table.
//  if ( empty( $errors ) ) 
//  {
//    $q = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), card_number, exp_m, exp_y, cvv, NOW() )";
//    $r = @mysqli_query ( $link, $q ) ;
//    if ($r)
//    { echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>'; }
//  
//    # Close database connection.
//    mysqli_close($link); 
//    exit();
//  }
//  
 if(empty($errors)){
     //$sql = "INSERT INTO users (first_name, last_name, email) VALUES ('John', 'Doe', 'JD@yahoo.com')";
     $sql = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), card_number, exp_month, exp_year, cvv, NOW() )";
     if(mysqli_query($link, $sql)){
    echo '<p>Records inserted successfully! Please <a href="login.php"> login</a></p>'; 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 } 
  
  
  
  
  
  
# Or report errors.
  else 
  {
    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>
<!--<h1>Register</h1>
<form action="register.php" method="post">
<p>First Name: <input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
Last Name: <input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
</p>
<p>email: <input type="text" name="email" size="20" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"> 
    Password: <input type="password" name="pass1" size="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
</p>
<p>Confirm Password: <input type="password" name="pass2" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"> 
Card Number: <input type="text" name="card_number" size="20" value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>">
</p>

<p>Expiry Month: <input type="text" name="exp_month" size="20" value="<?php if (isset($_POST['exp_month'])) echo $_POST['exp_month']; ?>"> 
    Expiry Year: <input type="text" name="exp_year" size="20" value="<?php if (isset($_POST['exp_year'])) echo $_POST['exp_year']; ?>">
</p>
<p>cvv: <input type="text" name="cvv" size="20" value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>">

<input type="submit" value="Register"> -->

<?php
include ( 'footer.html' ) ;
?>

<div class="container">
  <div class="row">
    <div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Create Account</div>
			<div class="card-body">
			<form action="register.php" class="was-validated" method="post">
				<div class="input-group">
					<div class="input-group-prepend">
					<span class="input-group-text">First and last name</span>
					</div>
					<input type="text" name="first_name" class="form-control" value="" required> 
					<input type="text" name="last_name" class="form-control" value="" required>
				 </div>
				 <br>
				 <div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email" value="" required>
				 	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

				 </div>
				 <div class="form-group">
					<input type="password" name="pass1" class="form-control" placeholder="Create New Password" value="" required>
				 </div>
				 <div class="form-group">
					<input type="password" name="pass2" class="form-control" placeholder="Confirm Password" value="" required>
				 </div>
		  </div>
		</div>
	</div>


<div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Add Payment Card</div>
			<div class="card-body">
				<div class="form-group">
				  <input type="text" name="card_number" class="form-control" placeholder="Card Number" value="" required>
				</div>
				<div class="input-group">
					<div class="input-group-prepend">
					<span class="input-group-text">Card Expiry Date</span>
					</div>
						<input type="text" name="exp_month" class="form-control" placeholder="MM" value="" required>
						<input type="text" name="exp_year" class="form-control" placeholder="YY" value="" required>
				</div>
				<br>
				<div class="form-group">
				  <input type="text" name="cvv"  class="form-control" placeholder="3 digit securuty code" value="" required>
				</div>

				<input type="submit" class="btn btn-secondary btn-lg btn-block" value="Submit"></p>
		</form>
			</div>
		</div>
	</div>
</div>
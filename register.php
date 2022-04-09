<h1 class="text-center">Register</h1>
<?php

session_start();


# Include login.html
include ( 'login.html' ) ;






# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
# Connect to the database.
  //require ('includes/connect_db.php'); 
  require ('connect1.php');
 # Initialize an error array.
  $errors = array();
  
  
  
  
  
  
# Check to see if form filled in.
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


  if ( empty( $_POST[ 'security_q' ] ) )
  { $errors[] = 'Enter your security question.' ; }
  else
  { $sq = mysqli_real_escape_string( $link, trim( $_POST[ 'security_q' ] ) ) ; }


  if ( empty( $_POST[ 'security_a' ] ) )
  { $errors[] = 'Enter your security answer.' ; }
  else
  { $sa = mysqli_real_escape_string( $link, trim( $_POST[ 'security_a' ] ) ) ; }
  
  
  
  
  
  
  
  
  
# Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  
  
  
  
  
  
  
  
  
# Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
  }
  
  
  

 if(empty($errors)){
    
     $sql = "INSERT INTO users (first_name, last_name, email, pass, security_q, security_a, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), SHA2('$sq',256), SHA2('$sa',256), NOW() )";
     if(mysqli_query($link, $sql)){

      #Direct to choose subscription if registration successful
       header('Location: chooseSubscription.php'); 
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


         <div class="form-group">
					<input type="text" name="security_q" class="form-control" placeholder="Create Security Question" value="" required>
				 </div>
				 <div class="form-group">
					<input type="text" name="security_a" class="form-control" placeholder="Security Question Answer" value="" required>
				 </div>
         <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Submit"></p>
		  </div>
		</div>
	</div>



		</form>
			</div>
		</div>
	</div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
$_SESSION['email'] = $_POST['email']; 
}
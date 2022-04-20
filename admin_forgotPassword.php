<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reset Password</title>
</head>
<body>
<h1 class="text-center">Reset Password</h1>

<?php 



include('login.html');

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( 'connect1.php' ) ;

  # Get connection, load, and validate functions.
  require ( 'admin_forgotPassword_tools.php' ) ;

  # Check login.
  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'security_a' ] ) ;

  # On success set session data and display logged in page.
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'admin_id' ] = $data[ 'admin_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
    load ( 'adminHome.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; } 

  # Close database connection.
  mysqli_close( $link ) ; 
}



?>


  
  

<div class="container">
  <div class="row">
    <div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Reset Password</div>
			<div class="card-body">
			<form action="admin_forgotPassword.php" class="was-validated" method="post">
				<div class="input-group">

				<p>Forgot your password? Enter in the details below to set a new password for your account.</p>
				
					
					
				 </div>
				 <br>
				 <div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email" value="" required>

					</div>
				<div class="form-group">
							<input type="text" name="security_q" class="form-control" placeholder="Your Security Question" value="" required>
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


</body>
</html>


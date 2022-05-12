<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reset Password</title>
</head>
<body>
<h1 class="text-center">Reset Password</h1>

<?php 
session_start();


include('login.html');

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( 'connect1.php' ) ;

  # Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM admins WHERE email= '{$_POST[ 'email' ]}'" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
	$row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
	$_SESSION[ 'security_q' ] = $row['security_q'] ;
	$_SESSION[ 'email' ] = $row['email'] ;
	header('Location: admin_securityQ.php');
}

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


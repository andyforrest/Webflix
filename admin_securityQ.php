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
$e = $_SESSION['email'];
$q = $_SESSION[ 'security_q' ];


include('login.html');

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    $sa = $_POST['security_a'];
  # Open database connection.
  require ( 'connect1.php' ) ;

  $querry = "SELECT admin_id FROM admins WHERE email='$e' AND security_a=SHA2('$sa',256)" ;
  $r = @mysqli_query ( $link, $querry ) ;
  if ( mysqli_num_rows( $r ) != 0 ){

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
     $_SESSION[ 'admin_id' ] = $row['admin_id'];
     header('Location: adminUser.php');
    
  }}
  else{
      echo 'Details not found. Please try again';
  } 

  # Close database connection.
  mysqli_close( $link ) ; 
}
//$email = $_SESSION[ 'email' ];


?>


  
  

<div class="container">
  <div class="row">
    <div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Reset Password</div>
			<div class="card-body">
			<form action="admin_securityQ.php" class="was-validated" method="post">
				<div class="input-group">

				<p>Forgot your password? Enter in the details below to set a new password for your account.</p>
				
					
					
				 </div>
				 <br>
				 <div class="form-group">
                 <small id="emailHelp" class="form-text text-muted">Email</small>
					<input type="email" name="email" class="form-control" placeholder="Email" value= "<?php echo $e; ?>"required readonly>

					</div>
				<div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Your Security Question</small>
							<input type="text" name="security_q" class="form-control" placeholder="Your Security Question" value="<?php echo $q; ?>"required readonly>
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

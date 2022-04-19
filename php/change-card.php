<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect1.php');
# Initialize an error array.
  $errors = array();
# Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }
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
    $q = "SELECT * FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    }
# On success new password into 'users' database table.
  if ( empty( $errors ) ) 
  {
//      $q = "UPDATE users SET card_number = $card_no WHERE email='$e'";
//      $q = "UPDATE users SET (card_number = card_number, exp_month = exp_month, exp_year  exp_year, cvv = cvv)WHERE email='$e'";
//    $q = "UPDATE users SET pass= SHA2('$p',256) WHERE email='$e'";
   $q = "UPDATE users SET card_number = $card_no, exp_month = $exp_m, exp_year = $exp_y, cvv = $cvv WHERE email='$e'";
//    $sql = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), card_number, exp_month, exp_year, cvv, NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: user.php");
    } else {
        echo "Error updating record: " . $link->error;
    }
# Close database connection.
    
	mysqli_close($link); 
    exit();
  }
# Or report errors.
  else 
  {  
    echo ' <div class="container"><div class="alert alert-dark alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
	<h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</div></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>


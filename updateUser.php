<?php

session_start();

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;



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
  { $errors[] = 'First name cannot be blank.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }


  if ( empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Last name cannot be blank.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }


  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Email cannot be left blank.' ; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }


  if ( empty( $_POST[ 'birthdate' ] ) )
  { $errors[] = 'Birthdate cannot be blank' ; }
  else
  { $birthdate = mysqli_real_escape_string( $link, trim( $_POST[ 'birthdate' ] ) ) ; }


  if ( empty( $_POST[ 'number' ] ) )
  { $errors[] = 'Phone number cannot be blank' ; }
  else
  { $num = mysqli_real_escape_string( $link, trim( $_POST[ 'number' ] ) ) ; }

  if ( empty( $_POST[ 'country' ] ) )
  { $errors[] = 'Country cannot be blank' ; }
  else
  { $country = mysqli_real_escape_string( $link, trim( $_POST[ 'country' ] ) ) ; }

  if ( empty( $_POST[ 'status' ] ) )
  { $errors[] = 'Status cannot be blank.' ; }
  else
  { $status = mysqli_real_escape_string( $link, trim( $_POST[ 'status' ] ) ) ; }



  
  

 if(empty($errors)){
    
     $sql = "UPDATE users SET first_name = '$fn', last_name = '$ln', email = '$e', birthdate = '$birthdate', number = '$num', country = '$country', status = '$status' WHERE user_id = {$_SESSION['id']}";
     if($request = mysqli_query($link, $sql)){

      #Direct to choose subscription if registration successful
       header('Location: viewUsers.php'); 
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


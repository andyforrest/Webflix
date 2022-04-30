<?php

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;





# Open database connection.
require ( 'connect1.php' ) ;

include ( 'admin.html' ) ;

if ( empty( $_POST[ 'category' ] ) )
  { $errors[] = 'Category cannot be blank.' ; }
  else
  { $cat = mysqli_real_escape_string( $link, trim( $_POST[ 'category' ] ) ) ; }



  if(empty($errors)){
    
    $sql = "UPDATE media SET category = '$cat' WHERE category = '{$_SESSION[ 'id' ] }'";
    if($request = mysqli_query($link, $sql)){

     #Direct to choose subscription if registration successful
      header('Location: viewCat.php'); 
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


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
  if ( empty( $_POST[ 'media_title' ] ) )
  { $errors[] = 'Title cannot be blank.' ; }
  else
  { $mt = mysqli_real_escape_string( $link, trim( $_POST[ 'media_title' ] ) ) ; }


  if ( empty( $_POST[ 'category' ] ) )
  { $errors[] = 'Category cannot be blank.' ; }
  else
  { $cat = mysqli_real_escape_string( $link, trim( $_POST[ 'category' ] ) ) ; }


  if ( empty( $_POST[ 'further_info' ] ) )
  { $errors[] = 'Further info cannot be left blank.' ; }
  else
  { $fi = mysqli_real_escape_string( $link, trim( $_POST[ 'further_info' ] ) ) ; }


  if ( empty( $_POST[ 'img' ] ) )
  { $errors[] = 'image cannot be blank' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'img' ] ) ) ; }


  if ( empty( $_POST[ 'type' ] ) )
  { $errors[] = 'Media type cannot be blank' ; }
  else
  { $ty = mysqli_real_escape_string( $link, trim( $_POST[ 'type' ] ) ) ; }

  if ( empty( $_POST[ 'preview' ] ) )
  { $errors[] = 'URL cannot be blank' ; }
  else
  { $pv = mysqli_real_escape_string( $link, trim( $_POST[ 'preview' ] ) ) ; }
 
  if ( empty( $_POST[ 'release_year' ] ) )
  { $errors[] = 'Release Year type cannot be blank' ; }
  else
  { $release_year = mysqli_real_escape_string( $link, trim( $_POST[ 'release_year' ] ) ) ; }

  if ( empty( $_POST[ 'language' ] ) )
  { $errors[] = 'Language cannot be blank' ; }
  else
  { $language = mysqli_real_escape_string( $link, trim( $_POST[ 'language' ] ) ) ; }

  if ( empty( $_POST[ 'duration' ] ) )
  { $errors[] = 'Release year cannot be blank' ; }
  else
  { $duration = mysqli_real_escape_string( $link, trim( $_POST[ 'duration' ] ) ) ; }


  
  

 if(empty($errors)){
    
     $sql = "UPDATE media SET media_title = '$mt', category = '$cat', further_info = '$fi', img = '$img', type = '$ty', preview = '$pv',
     release_year = '$release_year', language = '$language', duration = '$duration' WHERE media_id = {$_SESSION['id']}";
     if($request = mysqli_query($link, $sql)){

      #Direct to choose subscription if registration successful
       header('Location: adminMovies.php'); 
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

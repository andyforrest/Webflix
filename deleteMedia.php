<?php


# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

$_SESSION['id'] = $id;



# Open database connection.
require ( 'connect1.php' ) ;

include ( 'admin.html' ) ;

$sql = "DELETE FROM media WHERE media_id = '$id'";
     if($request = mysqli_query($link, $sql)){

      #Direct to choose subscription if registration successful
       header('Location: viewMedia.php'); 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
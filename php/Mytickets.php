<h1 class="text-center">myTickets</h1>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
include ( 'logout.html' ) ;

 # Open database connection.
  require ( 'connect1.php' ) ;
  
  $id = $_SESSION[ 'user_id' ];
  
 
  
  $sql = "SELECT * FROM booking WHERE user_id = '$id'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        
        	  
				
				  
        echo '<div class="col-md-3 d-flex justify-content-center">
		 <div class="card text-center" style="width: 18rem;">
		<div class="card text-center">
                 <p1>Please scan your QR code when entering the cinema!</p1>
		<img width="256" class="img-fluid" alt="QR Code " src="img/qrcode.png">
	         </div>
	         <div class="col-md-8">
	         <div class="card-body">
    ';
         } else{
        echo "You currently have no tickets booked!";
    }
    include('footer.html');

# Close database connection.
mysqli_close( $link ) ; }
?>
<link rel="stylesheet" type="text/css" href="css/style.css">


<!--<div class="container">
<div class="card bg-light mb-3">
	     <div class="row no-gutters">
	         <div class="col-md-4">
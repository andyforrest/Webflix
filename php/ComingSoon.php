<h1 class="text-center">Coming Soon</h1>
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
include('logout.html'); 

echo '<div class="container">
	
	<div class="row">
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src=img/Matrix.jpg alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">Matrix 4</h5>
				  
			   </div>
		  </div>
	   </div>
	
	   
		 
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src=img/KingsMan.jpg alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">The King\'s Man</h5>
				  
			   </div>
		  </div>
	   </div>
	
	   
		 
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src=img/Lightyear.jpg alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">Lightyear</h5>
				  
			   </div>
		  </div>
	   </div>';

include ( 'footer.html' ) ;
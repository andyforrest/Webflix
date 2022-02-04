<h1 class="text-center">Our Menu</h1>
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

# Set page title and display header section.

//$page_title = 'Home' ;
include ( 'logout.html' ) ;

# Open database connection.
	require ( 'connect1.php' ) ;

        

	echo '  
                           
<div class="container">
			
			<div class="row">
				<div class="col-md-6">
					<div class="card">
					<h5 class="card-header">Food</h5>
				<div class="card-body">
				
					<div class="table-responsive">
					<!--Table-->
					<table class="table table-striped">

					<!--Table head-->
				<thead>
				<tr>
					<th><h5 class="card-title">Item</h5></th>
					<th><h5 class="card-title">Price</h5></th>
				</tr>
				</thead>
	    <tbody>
            <tr>
			  <td>Regular Popcorn (Sweet/Salted) </td>
			  <td> &pound5.00 </td>
			</tr>
		  
	<tbody>
			<tr>
			  <td>Large Popcorn </td>
			  <td> &pound5.50 </td>
			</tr>
		  
	<tbody>
			<tr>
			  <td>Hot Dog </td>
			  <td> &pound5.00 </td>
			</tr>
		  
	<tbody>
			<tr>
			  <td>Nachos </td>
			  <td> &pound4.50 </td>
			</tr>
		  

		  
		
	     
		</tbody>
                
                <tbody>
			<tr>
			<td>Ice Cream (one scoop) </td>
			
			<td> &pound1.20 </td>
	
		<tbody>
			<tr>
			<td>Ice Cream (two scoops) </td>
			
			<td> &pound1.80 </td>
	
		<tbody>
			<tr>
			<td>Ice Cream (triple scoop)</td>
			
			<td> &pound2.00 </td>
	
	
		<tbody>
			<tr>
			<td>Hot Doughnut with topping</td>
			
			<td> &pound3.50 </td>
	
		<tbody>
			<tr>
			<td>Hot Waffle with topping </td>
			
			<td> &pound3.50 </td>
	
		
	     
		</tbody>
	</table>
  <!--Table-->
</div>
</div>
</div>
</div>


	 
	 
				<div class="col-md-6">
					<div class="card">
					<h5 class="card-header">Drinks</h5>
				<div class="card-body">
				
					<div class="table-responsive">
					<!--Table-->
					<table class="table table-striped">

					<!--Table head-->
				<thead>
				<tr>
					<th><h5 class="card-title">Item</h5></th>
					<th><h5 class="card-title">Price</h5></th>
				</tr>
				</thead>
	  

		<tbody>
			<tr>
			<td>Fizzy Drinks (250ml)</td>
			
			<td> &pound2.00 </td>
	
		<tbody>
			<tr>
			<td>Bottled Water 1l (Still/Sparkling) </td>
			
			<td> &pound1.80 </td>
	
		<tbody>
			<tr>
			<td>FruitShoot </td>
			
			<td> &pound1.50 </td>
	
		<tbody>
			<tr>
			<td>Capri-Sun</td>
			
			<td> &pound1.50 </td>
	
		<tbody>
			<tr>
			<td>Tea</td>
			
			<td> &pound2.00 </td>
	
		<tbody>
			<tr>
			<td>Coffee </td>
			
			<td> &pound2.00 </td>
	
		<tbody>
			<tr>
			<td>Hot Chocolate</td>
			
			<td> &pound2.50 </td>
	
		<tbody>
			<tr>
			<td>Peroni </td>
			
			<td> &pound4.50 </td>
	
		<tbody>
			<tr>
			<td>Budweiser </td>
			
			<td> &pound4.00 </td>
		
	     
		</tbody>
	</table>
  <!--Table-->
</div>
</div>
</div>
</div>';
                

        
	
	
        
# Display footer section.
include ( 'footer.html' ) ;

?>
<h1 class="text-center">Booking History</h1>
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
  
  
  
  //$q = "SELECT * FROM movie WHERE id IN (";
  //$q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
 /* $r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  echo '<div class="container">
<div class="card bg-light mb-3">
	     <div class="row no-gutters">
	         <div class="col-md-4">
		<img width="256" class="img-fluid" alt="QR Code " src="img/qrcode.png">
	         </div>
	         <div class="col-md-8">
	         <div class="card-body">
	';
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	<ul class="list-group list-group-flush">
	  <li class="list-group-item">
	    <div class="form-group row">
           	    <label for="booking ref" class="col-sm-12 col-form-label">
	     Booking Reference:  #EC1000' . $row['booking_id'] . '</label> 
	    </div>
             </li>
	 <li class="list-group-item">
	      <div class="form-group row">
	       <label for="booking ref" class="col-sm-12 col-form-label">
		Total Paid:   &pound ' . $row['total'] . ' 
	       </label>
	      </div>
	    </li>
          </ul>
    <hr>
<div class="card-footer">
   <small>'  . $row['booking_date'] . '</small>
</div>
</div>
</div>			
';
  }
*/
  
  
  
  
  $id = $_SESSION[ 'user_id' ];
  
 
  //$q = "SELECT * FROM users WHERE email='$id'";
  //$sql = "SELECT * FROM users WHERE user_id='$id'";
  //$sql = "SELECT * FROM booking WHERE user_id="'$id'"";
  $sql = "SELECT * FROM booking WHERE user_id = '$id'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo '<div class="container">';
        
        while($row = mysqli_fetch_array($result)){
        echo '<div class="alert alert-dark" role="alert">
            
<p>Booking ID:  ' . $row['booking_id'] . '</p>
    <hr>
<p>total: &pound '. $row['total'] . '</p>
    <hr>
<p>booking date: '. $row['booking_date'] . '</p>

</div>
			
';  
  }

}
}
else { echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
<p>You have no movie bookings</p>
</div>
<div> ' ; } 


include('footer.html');

# Close database connection.
  mysqli_close( $link ) ; 
?>



    
    
    
<!--    '<div class="container">
<div class="card bg-light mb-3">
	     <div class="row no-gutters">
	         <div class="col-md-4">
		<img width="256" class="img-fluid" alt="QR Code " src="img/qrcode.png">
	         </div>
	         <div class="col-md-8">
	         <div class="card-body">
	';
        
        
        echo "<table>";
            echo "<tr>";
                echo "<th>booking id</th>";
                echo "<th>user id</th>";
                echo "<th>total</th>";
                echo "<th>booking date</th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['booking_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td>" . $row['booking_date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}-->
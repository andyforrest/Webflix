
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



/*
$email = $_SESSION[ 'email' ];
//echo $email;

$query = "SELECT * FROM customers WHERE email = '$email'" ;
$request = mysqli_query( $link, $query ) ;

if ( mysqli_num_rows( $request ) > 0 )
	{

*/






# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM users WHERE user_id = '$id'" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
 $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

    

                
    
    
 echo  
  
 '
 <div class="container">
 <div class="row">
   <div class="col-sm">
       <div class="card bg-light mb-3">
         <div class="card-header">Edit User ' . $_GET['id'] . ' </div>
           <div class="card-body">
           <form action="updateUser.php" class="was-validated" method="post">
               <div class="input-group">
                   <div class="input-group-prepend">
                   <span class="input-group-text">First and last name</span>
                   </div>
                   <input type="text" name="first_name" class="form-control" value=' . $row['first_name'] . '  required> 
                   <input type="text" name="last_name" class="form-control" value=' . $row['last_name'] . '  required>
                </div>
                <br>
        
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Email</small>
                   <input type="email" name="email" class="form-control" placeholder="Email" value=' . $row['email'] . '  required>
                    
                </div>

        <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Date of Birth</small>
                   <input type="date" name="birthdate" class="form-control" placeholder="Birthdate" value=' . $row['birthdate'] . '  required>
                </div>

        <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Phone Number</small>
                   <input type="number" name="number" class="form-control" placeholder="Phone Number" value=' . $row['number'] . '  required>
                </div>
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Country</small>
                <textarea class="form-control" rows="1" id="country" name="country"   required>' . $row['country'] . ' </textarea>
                 
                    
                </div>
                
                <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Status</label>
  <select class="form-select" id="inputGroupSelect01" name="status">
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
    <option value="Blocked">Blocked</option>
  </select>
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
              
        ';
       

 
  
  
  

 //mysqli_close( $link );
  } 
/*}


	else{

		echo '

<div class="container">
  <div class="row">
    <div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Go Premium</div>
		  <div class="card-body">
			<h5 class="card-title">Sorry, for Premium Subscribers only! Click below to get access now</h5>
			<p class="card-text">Go premium today to access all media available on Webflix!</p>
			<a href="chooseSubscription.php" class="btn btn-secondary btn-lg btn-block">Go Premium</a>
		  </div>
		</div>
	</div>';
	}

*/





# Display footer section.
include ( 'footer.html' ) ;
?>
<link rel="stylesheet" type="text/css" href="css/style.css">



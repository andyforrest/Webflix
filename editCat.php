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
$sql = "SELECT `category` FROM `media` WHERE category = '$id' GROUP BY `category` ";
$r = mysqli_query( $link, $sql ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
 $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

    

                
    
    
 echo  
  
 '
 <div class="container">
 <div class="row">
   <div class="col-sm">
       <div class="card bg-light mb-3">
         <div class="card-header">Edit Category</div>
           <div class="card-body">
           <form action="updateCat.php" class="was-validated" method="post">
               
                <br>
        
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Current category</small>
                   <input type="category" name="category" class="form-control" placeholder="category" value=' . $row['category'] . '  required>
                    
                </div>

                
        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Update"></p>
        <a href="deleteCat.php?id='.$row['category'].'" class="btn btn-secondary btn-block" role="button" style="background-color:red;">
    Delete Category</a>
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




<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

# Open database connection.
require ( 'connect1.php' ) ;

include ( 'logout.html' ) ;




$email = $_SESSION[ 'email' ];
//echo $email;

$query = "SELECT * FROM customers WHERE email = '$email'" ;
$request = mysqli_query( $link, $query ) ;

if ( mysqli_num_rows( $request ) > 0 )
	{


# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM media WHERE media_id = '$id'" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
 $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );


    echo 
    

                
    
    
    '<div class="container">
			<h1 class="display-4"> '.$row['media_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
                                
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
                        <br>
				<p>'. $row['further_info']. '</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h4>Watch Now</h4>
				
				<h2>
				  <a href='. $row['preview']. '> <button type="button" class="btn btn-secondary" role="button"> Play </button></a>
				 
				</h2>
                                <br>
				 <h4>Reviews</h4>
				
				  <p>
				  <a href="mov-rev.php?id='.$row['media_id'].'">
				  <span class="btn btn-secondary">This Movie </span></a>
				  <a href="review.php?id='.$row['media_id'].'">
				  <span class="btn btn-secondary">All Media</span> </a>
				</p> 
			</div>';
  
  
  

 mysqli_close( $link );
  } 
}


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







# Display footer section.
include ( 'footer.html' ) ;
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
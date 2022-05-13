<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="container">
<h1 class="text-center">Our TV Shows</h1>
<div class="row">
 

<?php
# DISPLAY COMPLETE LOGGED IN PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.

//$page_title = 'Home' ;
include ( 'logout.html' ) ;

# Open database connection.
	require ( 'connect1.php' ) ;






# Retrieve movies from media
$q = "SELECT * FROM media WHERE type = 'TV Show'" ;
$r = mysqli_query( $link, $q ) ;

	

	
	if ( mysqli_num_rows( $r ) > 0 )
	{
         # Display body section.
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	echo '  
                           <div class="col-md-3 d-flex justify-content-center">
		 <div class="card text-center" style="width: 18rem;">
		<div class="card text-center">	  
				
				  <img src='. $row['img'].' alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">'. $row['media_title'].' </h5>
				  <a href="movie.php?id='.$row['media_id'].'" class="btn btn-secondary btn-block" role="button">
				 Watch Now</a>
			   </div>
		  </div>
		</div>';
                

        
	}
	# Close database connection.
	mysqli_close( $link) ; 
	}
        
        # Or display message.
	else { echo '<p>There are currently no TV Shows available.</p>
	' ; }
	
        

        
        
# Display footer section.
include ( 'footer.html' ) ;
?>
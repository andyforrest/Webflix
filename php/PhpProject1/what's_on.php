<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Set page title and display header section.
$page_title = 'What\’s On' ;
include ( 'logout.php' ) ;

# Open database connection.
	require ( 'connect1.php' ) ;

        
# Retrieve movies from 'movie' database table.
	$q = "SELECT * FROM movie" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
         # Display body section.
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	echo '  <img src='. $row['img'].' alt="Movie">
<h1> '. $row['movie_title'].' </h1>
	<a href="movie.php?id='.$row['id'].' >Book Now</a>  ';
	}
	# Close database connection.
	mysqli_close( $link) ; 
	}
        
        # Or display message.
	else { echo '<p>There are currently no movies showing.</p>
	' ; }
# Display footer section.
include ( 'footer.html' ) ;
?>

   
        
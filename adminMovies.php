<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Reviews' ;
include ( 'admin.html' ) ;

if ( isset( $_GET['movie_title'] ) ) $movie_title = $_GET['movie_title'] ;
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

# Open database connection.
require ( 'connect1.php' ) ;

$sql = "SELECT * FROM media WHERE type = 'Movie'";
$r = mysqli_query( $link, $sql ) ;




# Retrieve items from 'mov_rev' database table.

//$q = "SELECT * FROM mov_rev WHERE movie_title LIKE '%{$_GET['movie_title']}%'" ;

$r = mysqli_query( $link, $sql ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
   echo '<div class="alert alert-dark" role="alert">
	<h4 class="alert-heading">Media ID: ' . $row['media_id'] . '  </h4>
	<p>Title:  ' . $row['media_title'] . ' </p>
    <p>Cagtegory:  ' . $row['category'] . ' </p>
	<p>Media Type: ' . $row['type'] . '</p>
    <p>Further Info: ' . $row['further_info'] . '</p>
    <p>Release Year:  ' . $row['release_year'] . ' </p>
	<p>Language: ' . $row['language'] . '</p>
    <p>Duration: ' . $row['duration'] . '</p>
    <p>Image Location:' . $row['img'] . '</p>
    <p>URL: ' . $row['preview'] . '</p>

	</footer>
    <a href="editMovie.php?id='.$row['media_id'].'" class="btn btn-secondary btn-block" role="button">
    Edit</a>
	</div>
';  


  }
  echo '  <a href="addMedia.php" class="btn btn-secondary btn-block" role="button">
  Add Media</a>' ;
  } 
else { 
echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
	<p>There are currently no movies.</p>
<br>	<button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button><br>
</div>
<div>  ' ; }




  




	

        
# Close database connection.
mysqli_close( $link ) ;

include ( 'footer.html' ) ;
?>

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

$sql = "SELECT * FROM users";
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
	<h4 class="alert-heading">User: ' . $row['user_id'] . '  </h4>
	<p>First Name:  ' . $row['first_name'] . ' </p>
    <p>Last Name:  ' . $row['last_name'] . ' </p>
	<p>Email: ' . $row['email'] . '</p>
    <p>Birthdate: ' . $row['birthdate'] . '</p>
    <p>Phone Number: ' . $row['number'] . '</p>
    <p>Country: ' . $row['country'] . '</p>
    <p>Status: ' . $row['status'] . '</p>
	<hr>
	<footer class="blockquote-footer">
	<span>Registration Date: </span> 
	<cite title="Source Title"> '. $row['reg_date'].'</cite>
	</footer>
    <a href="editUser.php?id='.$row['user_id'].'" class="btn btn-secondary btn-block" role="button">
    Edit User</a>
	</div>
';  
  }
  } 
else { 
echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
	<p>There are currently no reviews for this movie.</p>
<br>	<button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button><br>
</div>
<div>  ' ; }

?>


<!-- Modal review-->
<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rev">Movie Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php # DISPLAY POST MESSAGE FORM.
# Display form.
echo '
<form action="post_action.php" method="post" accept-charset="utf-8">
	<div class="form-check">
	
        


<label for="movie_title">Movie Title:</label>
        

<select class="form-control" name="movie_title" id="movie_title">';
  
 



	

        
# Close database connection.
mysqli_close( $link ) ;

include ( 'footer.html' ) ;
?>

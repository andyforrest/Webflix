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
$page_title = 'Categories' ;
include ( 'admin.html' ) ;



# Open database connection.
require ( 'connect1.php' ) ;


$sql = "SELECT `category` FROM `media` WHERE `category` IS NOT NULL  GROUP BY `category`";
$r = mysqli_query( $link, $sql ) ;



if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
   echo '<div class="alert alert-dark" role="alert">
	<p>Category:  ' . $row['category'] . ' </p>
    
    <a href="editCat.php?id='.$row['category'].'" class="btn btn-secondary btn-block" role="button">
    Edit Category</a>
	</div>
';  
  }
  } 
else { 
echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
	<p>There are currently no categories found</p>
<br>	<button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button><br>
</div>
<div>  ' ; }

# Display footer section.
include ( 'footer.html' ) ;

?>
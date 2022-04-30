<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] = 'POST')
  {
    # Open database connection.
    require ( 'connect1.php' ) ;
# Execute inserting into 'review' database table.
$q = "INSERT INTO mov_rev(id,first_name,last_name,movie_title,rate, message, post_date) 
VALUES('{$_SESSION['user_id']}',
'{$_SESSION['first_name']}',
'{$_SESSION['last_name']}',
'{$_POST['movie_title']}',
'{$_POST['rate']}',
'{$_POST['message']}',NOW() )";
    $r = mysqli_query ( $link, $q ) ;
# Report error on failure.
if (mysqli_affected_rows($link) != 1) 
{ 
echo '<p>Error</p>'.mysqli_error($link); } else { include('review.php'); }
//header("Location: review.php");
    }
?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

# DISPLAY COMPLETE LOGGED IN PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Home' ;
include ( 'logout.html' ) ;


# Display body section.
echo "<h1>HOME</h1><p>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']} </p>";
# Display footer section.
include ( 'footer.html' ) ;
?>


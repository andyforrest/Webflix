<?php # DISPLAY COMPLETE LOGGED OUT PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Home' ;
include ( 'login.html' ) ;


# Clear existing variables.
$_SESSION = array() ;

# Destroy the session.
session_destroy() ;


# Display body section.
echo '<h1>Goodbye!</h1><p>You are now logged out.</p><p><a href="index.php">Login</a></p>' ;

# Display footer section.
include ( 'footer.html' ) ;
?>
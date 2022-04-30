<link rel="stylesheet" type="text/css" href="css/style.css">


<style>
    body{
        padding: 15px;
    }
    
</style>
<?php # DISPLAY COMPLETE LOGIN PAGE.

# Include HTML static file login.html
include ( 'login.html' ) ;

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}
//echo $_SERVER['HTTP_HOST'];
//echo dirname( $_SERVER[ 'PHP_SELF' ] );

?>
<h1>Login</h1>
<form action="login_action.php" method="post">
<p>Email Address: <input type="text" name="email"> </p>
<p>Password: <input type="password" name="pass"></p>
<p><input type="submit" value="Login" ></p>
</form>


<?php
include ( 'footer.html' ) ;
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Hotjar Tracking Code for My site -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2743830,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="container">
<h1 class="text-center">What's On</h1>
<div class="row">
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
<!--   
    <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
                     <div class="card text-center"></div> -->
<?php
# DISPLAY COMPLETE LOGGED IN PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; }

# Set page title and display header section.

//$page_title = 'Home' ;
include ( 'admin.html' ) ;

echo '

<div class="container">
  <div class="row">
    <div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Register as Admin</div>
		  <div class="card-body">
			<h5 class="card-title">Register as Admin</h5>
			<p class="card-text">Send a request to gain access to admin portal</p>
			<a href="adminRegister.php" class="btn btn-secondary btn-lg btn-block">Register</a>
		  </div>
		</div>
	</div>
	<div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Admin</div>
		  <div class="card-body">
			<h5 class="card-title">Admin</h5>
			<p class="card-text">Log in with your admin details to proceed</p>
			<a href="adminLogin.php" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Sign In</a>
            <br>
            <a href="admin_forgotPassword.php">Forgotten password?</a>
		  </div>
		</div>
	</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
		<form action="admin_login_action.php" class="was-validated" method="post"method="post">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Email" name="email" required>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="pass" required>
			</div>
				

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Sign In" >
		</form>
      </div>
    </div>
  </div>
</div>

';
        
        
# Display footer section.
include ( 'footer.html' ) ;
?>

   <!--<img src='. $row['img'].' alt="Movie" class="img-thumbnail bg-secondary">
<h5> '. $row['movie_title'].' </h5>
	<a href="movie.php?id='.$row['id'].'" class="btn btn-secondary btn-block" role="button">Watch Now</a>  ';
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

//$link = mysqli_connect('localhost','HNDSOFTSA16','GdPZUFCJ6V','HNDSOFTSA1');
//
//if(!$link){
//
//die('Could not connect to MySQL: ' .mysqli_error());
//
//}


include('login.html');
echo '

<div class="container">
  <div class="row">
    <div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Create Account</div>
		  <div class="card-body">
			<h5 class="card-title">Create Account</h5>
			<p class="card-text">Create an account!</p>
			<a href="register.php" class="btn btn-secondary btn-lg btn-block">Create Account</a>
		  </div>
		</div>
	</div>
	<div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Account</div>
		  <div class="card-body">
			<h5 class="card-title">Account</h5>
			<p class="card-text">Already have an account?  Sign in now to use our app.</p>
			<a href="login.php" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Sign In</a>
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
       
		<form action="login_action.php" class="was-validated" method="post"method="post">
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
include ( 'footer.html' ) ;

?>


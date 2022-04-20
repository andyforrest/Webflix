<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php




include('login.html');
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

include ( 'footer.html' ) ;

?>


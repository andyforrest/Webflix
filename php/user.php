<link rel="stylesheet" type="text/css" href="css/custom.css">
<h1 class="text-center">myAccount</h1>
<?php 
# Access session.
session_start() ;

echo  $_SESSION[ 'user_id' ];
# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ' ;
include('logout.html');


# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Open database connection.
require ( 'connect1.php' ) ;

$q = "SELECT * FROM users WHERE user_id={$_SESSION['user_id']}" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
        {
         echo '
	<div class="container">
	  <div class="row">
  ';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	<div class="col-sm">
	  <div class="alert alert-dark" alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  
		</button>	
	  <h2>'  . $row['first_name'] . ' '  . $row['last_name'] . '<strong>  </h2> 
	  <p><strong> User ID : EC2021 '  . $row['user_id'] . ' </strong></p>
	  <p><strong> Email : </strong> '  . $row['email'] . ' </p>
	  <p><strong> Registration Date : </strong> '  . $row['reg_date'] . ' </p>
	  <!-- Button trigger modal -->
	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#password">
		<i class="fa fa-edit"></i>  Change Password
	</button>
	 </div>
    </div>
    <style> .btn-link{
    color: #f8f9fa;}
    </style>
	';
}

            
            
            
            
            
            
        }
       else { echo '<h3>No user details.</h3>

' ; }

# Retrieve items from 'users' database table.
	$q = "SELECT * FROM users WHERE user_id={$_SESSION['user_id']}" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  echo '<div class="col-sm">';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	
		<div class="alert alert-secondary" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			
		   </button>
			<h2>Card Stored</h2>
<p><strong> Card Holder : </strong> '  . $row['first_name'] . '  '  . $row['last_name'] . ' </p>
<p><strong> Card Number : </strong> '  . $row['card_number'] . ' </p>
<p><strong> Expire Date : </strong> '  . $row['exp_month'] . '   '  . $row['exp_year'] . '</p>
	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#card">
		<i class="fa fa-credit-card"></i>  Update Card 

 </button>
		</div>
	</div>
	';
  }
	
  # Close database connection.
  mysqli_close( $link ) ; 
}
else { echo '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		   </button>
			<h1>Card Stored</h1>
			<h3>No card stored.</h3>
		</div>
		
' ; }

# Display footer section.
include ( 'footer.html' ) ; 
?>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
   <form action="change-password.php" method="post">
      <div class="form-group">
       <input type="email"  name="email" 
                 class="form-control"  
                 placeholder="Confirm Email" 				
                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" 
   required>
     </div>
<div class="form-group">
    <input type="password"
                name="pass1" 
	   class="form-control" 
	   placeholder="New Password"
	  value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" 
  required> 
</div>
<div class="form-group">
                <input type="password" 
		  name="pass2" 
		  class="form-control" 
		  placeholder="Confirm New Password"
		  value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" 
  required>
            </div>
</div>
    <div class="modal-footer">
        <div class="form-group">
          <input type="submit" 
    	        name="btnChangePassword" 
        class="btn btn-dark btn-lg btn-block" value="Save Changes"/>
           </div>
         </div>
 </form>
      </div><!--Close body-->
    </div><!--Close modal-body-->
  </div><!-- Close modal-fade-->

  
  
  
  <div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="card" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <div class="modal-body">
       <form action="change-card.php" method="post">
           
           
     </div> 
           <div class="modal-body">
               
      <div class="form-group">
       <input type="email"  name="email" 
                 class="form-control"  
                 placeholder="Confirm Email" 				
                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" 
   required>
     </div>         
     <div class="form-group">
          <input type="number"  name="card_number" 
                 class="form-control"  
                 placeholder="Card Number" 				
                value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>" 
   required>
     </div>
      
               
               <div class="form-group">
          <input type="number"  name="exp_month" 
                 class="form-control"  
                 placeholder="Exp month" 				
                value="<?php if (isset($_POST['exp_month'])) echo $_POST['exp_month']; ?>" 
   required>
     </div>
               <div class="form-group">
          <input type="number"  name="exp_year" 
                 class="form-control"  
                 placeholder="Exp year" 				
                value="<?php if (isset($_POST['exp_year'])) echo $_POST['exp_year']; ?>" 
   required>
     </div>
               <div class="form-group">
          <input type="number"  name="cvv" 
                 class="form-control"  
                 placeholder="cvv" 				
                value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>" 
   required>
     </div>
               
               
           
 
</div>
    <div class="modal-footer">
        <div class="form-group">
          <input type="submit" 
    	        name="btnChangePassword" 
        class="btn btn-dark btn-lg btn-block" value="Save Changes"/>
           </div>
         </div>
 </form>
      </div><!--Close body-->
    </div><!--Close modal-body-->
  </div><!-- Close modal-fade-->
           
           


<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;





# Open database connection.
require ( 'connect1.php' ) ;

include ( 'admin.html' ) ;


# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
# Connect to the database.
  //require ('includes/connect_db.php'); 
  require ('connect1.php');
 # Initialize an error array.
  $errors = array();
  
  
  
  
  
  
# Check to see if form filled in.
  if ( empty( $_POST[ 'media_title' ] ) )
  { $errors[] = 'Title cannot be blank.' ; }
  else
  { $mt = mysqli_real_escape_string( $link, trim( $_POST[ 'media_title' ] ) ) ; }


  if ( empty( $_POST[ 'category' ] ) )
  { $errors[] = 'Category cannot be blank.' ; }
  else
  { $cat = mysqli_real_escape_string( $link, trim( $_POST[ 'category' ] ) ) ; }


  if ( empty( $_POST[ 'further_info' ] ) )
  { $errors[] = 'Further info cannot be left blank.' ; }
  else
  { $fi = mysqli_real_escape_string( $link, trim( $_POST[ 'further_info' ] ) ) ; }


  if ( empty( $_POST[ 'img' ] ) )
  { $errors[] = 'image cannot be blank' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'img' ] ) ) ; }


  if ( empty( $_POST[ 'type' ] ) )
  { $errors[] = 'Media type cannot be blank' ; }
  else
  { $ty = mysqli_real_escape_string( $link, trim( $_POST[ 'type' ] ) ) ; }

  if ( empty( $_POST[ 'url' ] ) )
  { $errors[] = 'URL cannot be blank' ; }
  else
  { $pv = mysqli_real_escape_string( $link, trim( $_POST[ 'url' ] ) ) ; }


 



  
  

 if(empty($errors)){


    
     $sql = "INSERT INTO media(`media_title`, `category`, `type`, `further_info`, `img`, `preview`) VALUES ('$mt', '$cat', '$ty', '$fi', '$img', '$pv' )";
     if($request = mysqli_query($link, $sql)){

      #Direct to choose subscription if registration successful
       header('Location: viewMedia.php'); 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 } 
  
  
  
  
  
  
# Or report errors.
  else 
  {
    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p>';
    # Close database connection.
    mysqli_close( $link );
  }  
}









                
    
    
 echo  
  
 '

 <div class="container">
 <div class="row">
   <div class="col-sm">
       <div class="card bg-light mb-3">
         <div class="card-header">Add Media  </div>
           <div class="card-body">
           <form action="addMedia.php" class="was-validated" method="post">
               
                
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Title</small>
                <textarea class="form-control" rows="1" id="message" name="media_title"   required></textarea>
                 
                    
                </div>
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Category</small>
                <input type="text" name="category" class="form-control" required>
                    
                </div>
        
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Further Info</small>
                <textarea class="form-control" rows="5" id="further_info" name="further_info"   required></textarea>

                    
                </div>

        <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Image Location</small>
                   <input type="text" name="img" class="form-control"  required>
                </div>

        <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Media Location</small>
                   <input type="text" name="url" class="form-control" placeholder="url"  required>
                </div>
                
                <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Media Type</label>
  <select class="form-select" id="inputGroupSelect01" name="type">
    <option value="TV Show">TV Show</option>
    <option value="Movie">Movie</option>
  </select>
</div>
                
        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Submit"></p>
         </div>
       </div>
   </div>



       </form>
           </div>
       </div>
   </div>
</div>
              
        ';
       
 
# Display footer section.
include ( 'footer.html' ) ;
?>
<link rel="stylesheet" type="text/css" href="css/style.css">

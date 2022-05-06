<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'admin_login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

$_SESSION['id'] = $id;



# Open database connection.
require ( 'connect1.php' ) ;

include ( 'admin.html' ) ;






# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM media WHERE media_id = '$id'" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
 $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

$media = $row['media_title']   ; 

                
    
    
 echo  
  
 '

 <div class="container">
 <div class="row">
   <div class="col-sm">
       <div class="card bg-light mb-3">
         <div class="card-header">Edit Media ' . $_GET['id'] . ' </div>
           <div class="card-body">
           <form action="updateTV.php" class="was-validated" method="post">
               
                
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Title</small>
                <textarea class="form-control" rows="1" id="message" name="media_title"   required>' . $row['media_title'] . ' </textarea>
                 
                    
                </div>
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Category</small>
                <input type="text" name="category" class="form-control" value=' . $row['category'] . '  required>
                    
                </div>
        
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Further Info</small>
                <textarea class="form-control" rows="5" id="further_info" name="further_info"   required>' . $row['further_info'] . '</textarea>

                    
                </div>

                
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Release Year</small>
                <input type="text" name="release_year" class="form-control" value=' . $row['release_year'] . '  required>
                    
                </div>

                
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Language</small>
                <input type="text" name="language" class="form-control" value=' . $row['language'] . '  >
                    
                </div>

                
                <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Duration</small>
                <input type="text" name="duration" class="form-control" value=' . $row['duration'] . '  required>
                    
                </div>

        <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Image Location</small>
                   <input type="text" name="img" class="form-control" placeholder="img" value=' . $row['img'] . '  required>
                </div>

        <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Media Location</small>
                   <input type="text" name="preview" class="form-control" placeholder="url" value=' . $row['preview'] . '  required>
                </div>
                
                <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Media Type</label>
  <select class="form-select" id="inputGroupSelect01" name="type">
    <option value="TV Show">TV Show</option>
    <option value="Movie">Movie</option>
  </select>
</div>

<div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Number of Seasons</small>
                   <input type="text" name="num_seasons" class="form-control" placeholder="url" value=' . $row['num_seasons'] . '  required>
                </div>

                <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Number of Episodes</small>
                   <input type="text" name="num_episodes" class="form-control" placeholder="url" value=' . $row['num_episodes'] . '  required>
                </div>
                
        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Submit"></p>
        <a href="deleteMedia.php?id='.$row['media_id'].'" class="btn btn-secondary btn-block" role="button" style="background-color:red;">
    Delete Media</a>
         </div>
       </div>
   </div>



       </form>
           </div>
       </div>
   </div>
</div>
              
        ';
       
 
  
  
  

 //mysqli_close( $link );
  } 
  






# Display footer section.
include ( 'footer.html' ) ;
?>
<link rel="stylesheet" type="text/css" href="css/style.css">

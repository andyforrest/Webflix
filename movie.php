
<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

# Open database connection.
require ( 'connect1.php' ) ;

include ( 'logout.html' ) ;

/*$sql = "SELECT * FROM movie";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>movie_title</th>";
                echo "<th>further_info</th>";
                echo "<th>preview</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['movie_title'] . "</td>";
                echo "<td>" . $row['further_info'] . "</td>";
                echo "<td>" . $row['preview'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

echo '<div class="container">
			<h1 class="display-4">'.$row['movie_title'].'</h1>

            <div class="row">
	<div class="col-sm-12 col-md-4">
	  <div class="embed-responsive embed-responsive-16by9">
	     <iframe class="embed-responsive-item" src='. $row['preview'].'   
    frameborder="0" allow="accelerometer; 
     autoplay; 
     encrypted-media; 
     gyroscope; 
     picture-in-picture"   allowfullscreen>
	        </iframe>
	     </div><!- - Close embed-responsive - - >
            </div> <!- - Close column - - >

            <div class="col-sm-12 col-md-4">
<p>'.$row['further_info'].'</p>
    </div>
    <div class="col-sm-12 col-md-4">
<h4>Book Now</h4>
<hr>
<h2> 
<a href="show1.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show1'] . ' </button></a>
<a href="show2.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show2'] . ' </button></a>
<a href="show3.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show3'] . ' </button></a></h2> ';

*/











# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM movie WHERE id = '$id'" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
 $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

 # Check if cart already contains one movie id.
if ( isset( $_SESSION['cart'][$id] ) )
  {
# Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    echo 
    
//    '  
//                           <div class="col-md-3 d-flex justify-content-center">
//		 <div class="card text-center" style="width: 18rem;">
//		<div class="card text-center">	  
//				
//                                    <h5 class="card-title">'. $row['movie_title'].' </h5>
//                                      <iframe class="embed-responsive-item" src='. $row['preview'].'
//				  
//                                      <p>'.$row['further_info'].'</p>
//				  <a href="movie.php?id='.$row['id'].'" class="btn btn-secondary btn-block" role="button">
//				 Book Now</a>
//			   </div>
//		  </div>
//		</div>';
                
    
    
    '<div class="container">
			<h1 class="display-4"> '.$row['movie_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
                                
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
                        <br>
				<p>'. $row['further_info']. '</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h4>Book Now</h4>
				
				<h2>
				  <a href="show1.php"> <button type="button" class="btn btn-secondary" role="button"> 11.30 </button></a>
				  <a href="show2.php"> <button type="button" class="btn btn-secondary" role="button"> 13.20 </button></a>
				  <a href="show3.php"> <button type="button" class="btn btn-secondary" role="button"> 17.45 </button></a>
				</h2>
                                <br>
				 <h4>Movie Reviews</h4>
				
				  <p>
				  <a href="mov-rev.php?id='.$row['id'].'">
				  <span class="btn btn-secondary">This Movie </span></a>
				  <a href="review.php?id='.$row['id'].'">
				  <span class="btn btn-secondary">All Movies</span> </a>
				</p> 
			</div>';
  /*  '<div class="container">
			<h1 class="display-4">'.$row['movie_title'].'</h1>

            <div class="row">
	<div class="col-sm-12 col-md-4">
	  <div class="embed-responsive embed-responsive-16by9">
	     <iframe class="embed-responsive-item" src='. $row['preview'].'   
    frameborder="0" allow="accelerometer; 
     autoplay; 
     encrypted-media; 
     gyroscope; 
     picture-in-picture"   allowfullscreen>
	        </iframe>
	     </div><!- - Close embed-responsive - - >
            </div> <!- - Close column - - >

            <div class="col-sm-12 col-md-4">
<p>'.$row['further_info'].'</p>
    </div>
    <div class="col-sm-12 col-md-4">
<h4>Book Now</h4>
<hr>
<h2> 

<a href="show1.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show1'] . ' </button></a>
<a href="show2.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show2'] . ' </button></a>
<a href="show3.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show3'] . ' </button></a></h2> 
    

<h4>Movie Reviews</h4>
<hr>
<h2>
<a href="mov-rev.php?movie_title='.$row['movie_title'].'"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['movie_title'] . ' Reviews </button></a>
<a href="review.php?id='.$row['id'].'"><button type="button" class="btn btn-secondary" role="button">All Reviews</button></a>
    
</h2>


';*/
    
    
    
 
    
  }
else
  {
    # Or add one of this product to the cart.
  $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['mov_price'] );
  
  echo '<div class="container">
			<h1 class="display-4"> '.$row['movie_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
                                
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
                        <br>
				<p>'. $row['further_info']. '</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h4>Book Now</h4>
				
				<h2>
				  <a href="show1.php"> <button type="button" class="btn btn-secondary" role="button"> 11.30 </button></a>
				  <a href="show2.php"> <button type="button" class="btn btn-secondary" role="button"> 13.20 </button></a>
				  <a href="show3.php"> <button type="button" class="btn btn-secondary" role="button"> 17.45 </button></a>
				</h2>
                                <br>
				 <h4>Movie Reviews</h4>
				
				  <p>
				  <a href="mov-rev.php?id='.$row['id'].'">
				  <span class="btn btn-secondary">This Movie </span></a>
				  <a href="review.php?id='.$row['id'].'">
				  <span class="btn btn-secondary">All Movies</span> </a>
				</p> 
			</div>';
  
  # Display footer section.


 mysqli_close( $link );
  } 
}
include ( 'footer.html' ) ;
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="container">
<h1 class="text-center">Admin Homepage</h1>
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


        
        
# Display footer section.
include ( 'footer.html' ) ;
?>

   <!--<img src='. $row['img'].' alt="Movie" class="img-thumbnail bg-secondary">
<h5> '. $row['movie_title'].' </h5>
	<a href="movie.php?id='.$row['id'].'" class="btn btn-secondary btn-block" role="button">Watch Now</a>  ';
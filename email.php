<?php

include ( 'register.php' ) ;

//Create body of email

$body = "Please click to link to confirm your account! :)";

mail('email', 'Confirm Account', $body);
<!DOCTYPE HTML>
<html>
<head>
    <title>PHP Application</title>
</head>
<body>
<?php
$body_temp = 98.6 ;
echo $body_temp ;
echo "<p>Body temperature is $body_temp degrees Faranheit";

$Celcius = ($body_temp-32)/1.8;
echo "<p>Body temperature is $Celcius degrees Celcius";
?>
</body>
</html>